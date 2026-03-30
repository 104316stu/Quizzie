<?php
session_start();

// welke topic hoort bij welk bestand
$topic_map = [
    'autism' => './Question/Autism.php',
    'adhd' => './Question/Adhd.php',
    'dyslexia' => './Question/Dyslexia.php',
    'touretts' => './Question/Touretts.php',
];

// sla topic op in sessie als het een POST is
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['topic'])) {
    $topic = $_POST['topic'];
    if (array_key_exists($topic, $topic_map)) {
        session_destroy();
        session_start();
        $_SESSION['quiz_topic']    = $topic;
        $_SESSION['quiz_current']  = 0;
        $_SESSION['quiz_score']    = 0;
        $_SESSION['quiz_feedback'] = null;
        $_SESSION['quiz_checked']  = false;
        $_SESSION['quiz_lastOpenAnswer'] = "";
        $_SESSION['quiz_wrong'] = 0;
        
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// als er geen topic is terug naar home
if (!isset($_SESSION['quiz_topic'])) {
    header('Location: ../Index.html');
    exit;
}

$topic = $_SESSION['quiz_topic'];
include_once($topic_map[$topic]);

if (!isset($_SESSION['quiz_questions'])) {
    $questions = get_questions();
    shuffle($questions);
    $_SESSION['quiz_questions'] = $questions;
}

$questions = $_SESSION['quiz_questions'];
$total     = count($questions);

$current  = $_SESSION['quiz_current'];
$score    = $_SESSION['quiz_score'];
$feedback = $_SESSION['quiz_feedback'];
$checked  = $_SESSION['quiz_checked'];
$textareaValue = $_SESSION['quiz_lastOpenAnswer'];
$wrong = $_SESSION['quiz_wrong'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'check' && $current < $total && !$checked) {
        $q = $questions[$current];

        if ($q['openQuestion']) {
            $textArea  = strtolower($_POST['open_answer']);
            $areascore = 0;

            foreach ($q['keywords'] as $kw) {
                if (str_contains($textArea, strtolower($kw))) {
                    $areascore++;
                }
            }

            $minimumKeywords = $q['minimumKeywords'] ?? (int) ceil(count($q['keywords']) * 0.5);

            if ($areascore >= $minimumKeywords) {
                $_SESSION['quiz_score']++;
                $_SESSION['quiz_feedback'] = ['text' => 'Correct!', 'type' => 'correct'];
            } else {
                $_SESSION['quiz_feedback'] = ['text' => 'Voorbeeldantwoord: ' . $q['exampleAnswer'], 'type' => 'wrong'];
            }
            $_SESSION['quiz_lastOpenAnswer'] = $_POST['open_answer'];
        } else {
            // kijk of het gekozen antwoord klopt
            $chosen = (int)$_POST['chosen'];

            if ($chosen === $q['correct']) {
                $_SESSION['quiz_score']++;
                $_SESSION['quiz_feedback'] = ['text' => 'Correct!', 'type' => 'correct'];
            } else {
                $_SESSION['quiz_feedback'] = ['text' => 'Fout!', 'type' => 'wrong'];
                $_SESSION['quiz_wrong'] = $chosen;
            }
            // Store the chosen answer regardless of correctness
            $_SESSION['quiz_chosen'] = $chosen;
        }

        $_SESSION['quiz_checked'] = true;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    if ($action == 'next' && $checked) {
        $_SESSION['quiz_current']++;
        $_SESSION['quiz_feedback'] = null;
        $_SESSION['quiz_checked']  = false;
        $_SESSION['quiz_lastOpenAnswer'] = '';
        $_SESSION['quiz_chosen'] = null; // Clear chosen answer for next question
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    // quiz opnieuw starten
    if ($action == 'restart') {
        session_destroy();
        header('Location: ../index.html');
        exit;
    }
}

$current  = $_SESSION['quiz_current'];
$score    = $_SESSION['quiz_score'];
$feedback = $_SESSION['quiz_feedback'];
$checked  = $_SESSION['quiz_checked'];
$textareaValue = $_SESSION['quiz_lastOpenAnswer'];
$wrong = $_SESSION['quiz_wrong'];

include_once("./Views/quiz_view.php");