<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="../Styles/Main.css">
    <link rel="stylesheet" href="../Styles/QuizPage.css">
    <script src="../Scripts/QuizPage.js" defer></script>
    <script src="../Scripts/screensaver.js" defer></script>
</head>
<body>

<?php include_once("./includes/header.php"); ?>

<div class="container">

    <?php if ($current >= $total) { ?>
        <div class="results">
            <h2>Quiz Over!</h2>
            <p>Jouw score: <?= $score ?>/<?= $total ?></p>
            <form method="post">
                <input type="hidden" name="action" value="restart">
                <button type="submit">Terug naar Home</button>
            </form>
        </div>
    <?php } else {
        $q = $questions[$current];
    ?>
        <div class="progress-score">
            <span>Vraag <?= $current + 1 ?>/<?= $total ?></span>
            <span>Score: <?= $score ?></span>
        </div>

        <p class="question"><?= $q['question'] ?></p>

        <?php if (!$q['openQuestion']) { ?>
            <form method="post" id="quiz-form">
                <input type="hidden" name="action" value="check">
                <div class="answers">
                    <?php 
                    $chosen_answer = $_SESSION['quiz_chosen'] ?? null;
                    foreach ($q['answers'] as $i => $answerText) { 
                        $is_correct = ($i === $q['correct']);
                        $is_chosen = ($i === $chosen_answer);
                        $class = 'answer';
                        if ($checked) {
                            if ($is_correct) {
                                $class .= ' correct';
                            } elseif ($is_chosen) {
                                $class .= ' wrong';
                            }
                        } elseif ($is_chosen) {
                            $class .= ' selected';
                        }
                    ?>
                        <button
                            type="button"
                            class="<?= $class ?>"
                            data-choice="<?= $i ?>"
                            <?= $checked ? 'disabled' : '' ?>
                        >
                            <?= $answerText ?>
                        </button>
                    <?php } ?>
                </div>
                <input type="hidden" name="chosen" id="chosen-input">
            </form>
        <?php } else { ?>
            <form method="post" id="quiz-form">
                <input type="hidden" name="action" value="check">
                <textarea
                    name="open_answer"
                    placeholder="Typ hier je antwoord..."
                    <?= $checked ? 'readonly' : ''?>
                ><?= $textareaValue ?? "" ?></textarea>
            </form>
        <?php } ?>

        <?php if ($feedback) { ?>
            <div class="feedback <?= $feedback['type'] ?>"><?= $feedback['text'] ?></div>
        <?php } ?>

        <div class="controls">
            <?php if (!$checked) { ?>
                <button type="submit" form="quiz-form">Check</button>
            <?php } else { ?>
                <form method="post" style="display:contents">
                    <input type="hidden" name="action" value="next">
                    <button type="submit">Next Question</button>
                </form>
            <?php } ?>
        </div>
    <?php } ?>

</div>
<div class="screensaver-layout hidden">
    <div id="box">
      <img src="../img/brain.png" alt="Image of an brain" class="screensaver-image">
    </div>
  </div>

</body>
</html>