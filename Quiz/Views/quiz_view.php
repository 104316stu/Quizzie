<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="../../Styles/QuizPage.css">
    <link rel="stylesheet" href="../../Styles/home.css">
    <script src="../../Scripts/QuizPage.js" defer></script>
</head>
<body>

<?php include_once("./includes/header.php"); ?>

<div class="container" id="container">

<?php if ($current >= $total) { ?>

    <p>Quiz over! Score: <?= $score ?>/<?= $total ?></p>
    <form method="post">
        <input type="hidden" name="action" value="restart">
        <button type="submit">Terug Naar home!</button>
    </form>

<?php } else {
    $q = $questions[$current];
?>

    <p><?= $q['question'] ?></p>

    <?php if (!$q['openQuestion']) { ?>

        <form method="post" style="display:contents">
            <input type="hidden" name="action" value="check">
            <input type="hidden" name="chosen" id="chosen" value="">
            <?php foreach ($q['answers'] as $i => $answerText) { ?>
                <button
                    type="button"
                    value="<?= $i ?>"
                    class="question<?= ($checked && $i === $q['correct']) ? ' correct' : (($checked && $i === $wrong) ? ' wrong' : '') ?>"
                    <?= $checked ? 'disabled' : '' ?>
                >
                    <?= ($i + 1) . '. ' . $answerText ?>
                </button>
            <?php } ?>
            <?php if (!$checked) { ?>
            <button type="submit">NEXT</button>
            <?php } ?>
        </form>

        <?php if ($feedback) { ?>
            <p class="feedback <?= $feedback['type'] ?>"><?= $feedback['text'] ?></p>
        <?php } ?>

        <?php if ($checked) { ?>
            <form method="post" style="display:contents">
                <input type="hidden" name="action" value="next">
                <button type="submit">Next question</button>
            </form>
        <?php } ?>

    <?php } else { ?>

        <form method="post" style="display:contents">
            <input type="hidden" name="action" value="check">
            <textarea
                class="question"
                name="open_answer"
                <?= $checked ? 'readonly' : ''?>
            ><?= $checked ? $textareaValue ?? "" : "" ?></textarea>

            <?php if ($feedback) { ?>
                <p class="feedback <?= $feedback['type'] ?>"><?= $feedback['text'] ?></p>
            <?php } ?>

            <?php if (!$checked) { ?>
                <button type="submit">Check</button>
            <?php } ?>
        </form>

        <?php if ($checked) { ?>
            <form method="post" style="display:contents">
                <input type="hidden" name="action" value="next">
                <button type="submit">Next question</button>
            </form>
        <?php } ?>

    <?php } ?>

<?php } ?>

</div>
</body>
</html>