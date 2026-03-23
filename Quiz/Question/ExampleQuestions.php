<?php
function get_questions() {
    return [
        [
            'question'     => 'Name a bunch of colorsssssss', // naam van de vraag
            'openQuestion' => true,
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
            'correct'      => 0, // de correcte antwoord is de eerste dat begint met 0 dus de tweede is 1 etc
        ],
        [
            'question'     => 'What color is the sky?',
            'openQuestion' => false,
            'answers'      => ['Blue', 'Red', 'Pink'],
            'correct'      => 0,
        ],
        
    ];
}