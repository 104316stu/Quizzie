<?php
function get_questions()
{
    $questions = [
        [
            'question'     => 'Name a bunch of colorsssssss', // naam van de vraag
            'openQuestion' => true,
            'minimumKeywords'=> 5,
            'keywords'     => [
                'red','blue','yellow','green','pink','purple','orange','brown',
                'black','white','gray','cyan','magenta','lime','teal','navy',
                'maroon','olive','aqua', // dit zijn keywords die iemand moet invoeren om een goed antwoord min 5 keyworden of over de helft alleen voor open vragen
            ],
           'exampleAnswer' => 'Green, Yellow, Pink, Red...', // dit is een hint/antwoord wanneer iemand het fout heeft
        ],
        [
            'question'     => 'What color is grass?',
            'openQuestion' => false,
            'answers'      => ['Green', 'Yellow', 'Purple'],
            'correct'      => 0, // dit is om te zien welke antwoordt correct is
        ],
        [
            'question'     => 'What color is the sky?',
            'openQuestion' => false,
            'answers'      => ['Blue', 'Red', 'Pink'],
            'correct'      => 0,
        ],
    ];

    foreach ($questions as &$q) {
        if (!$q['openQuestion']) {
            $correct_answer = $q['answers'][$q['correct']];
            shuffle($q['answers']);
            $q['correct'] = array_search($correct_answer, $q['answers']);
        }
    }
    unset($q);

    return $questions;
}