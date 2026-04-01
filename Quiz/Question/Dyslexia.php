<?php
function get_questions()
{
    $questions = [
        [
            'question'        => 'Name some signs or symptoms that can be associated with dyslexia',
            'openQuestion'    => true,
            'minimumKeywords' => 4,
            'keywords'        => [
                'reading', 'spelling', 'writing', 'slow', 'letters', 'words', 'reversals',
                'confusion', 'memory', 'phonics', 'sounds', 'sequencing', 'difficulty',
                'comprehension', 'rhyming', 'copying', 'directions', 'left', 'right', 'time',
            ],
            'exampleAnswer'   => 'Difficulty with reading, spelling, reversals, slow writing, confusion with left and right...',
        ],
        [
            'question'        => 'Name some famous or successful people who have or had dyslexia',
            'openQuestion'    => true,
            'minimumKeywords' => 3,
            'keywords'        => [
                'einstein', 'leonardo', 'edison', 'walt', 'spielberg',
                'jobs', 'branson', 'cher', 'whoopi', 'goldberg',
                'keanu', 'reeves', 'bloom', 'picasso', 'christie',
                'andersen', 'knightley', 'oliver', 'cruise', 'ford',
            ],
            'exampleAnswer'   => 'Einstein, Picasso, Branson, Spielberg, Whoopi Goldberg...',
        ],
        [
            'question'        => 'Name some tools or aids that can help people with dyslexia in daily life',
            'openQuestion'    => true,
            'minimumKeywords' => 3,
            'keywords'        => [
                'audiobooks', 'audio', 'speech', 'spellcheck', 'spell',
                'font', 'dyslexie', 'opendyslexic', 'recorder', 'overlays',
                'ruler', 'planner', 'mindmap', 'highlighter', 'calculator',
            ],
            'exampleAnswer'   => 'Audiobooks, speech software, spellcheck, overlays, a ruler, highlighter...',
        ],
        [
            'question'        => 'Name some strengths or abilities that people with dyslexia often have',
            'openQuestion'    => true,
            'minimumKeywords' => 3,
            'keywords'        => [
                'creative', 'creativity', 'visual', 'spatial', 'problem',
                'solving', 'storytelling', 'empathy', 'design', 'music',
                'sport', 'intuition', 'innovation', 'lateral',
            ],
            'exampleAnswer'   => 'Creativity, visual thinking, empathy, storytelling, design, innovation...',
        ],
        [
            'question'        => 'Name some ways a teacher or school can support a student with dyslexia',
            'openQuestion'    => true,
            'minimumKeywords' => 3,
            'keywords'        => [
                'time', 'oral', 'verbal', 'audiobook', 'font', 'coloured',
                'paper', 'instructions', 'aloud', 'quiet', 'breaks',
                'laptop', 'computer', 'tablet', 'specialist',
            ],
            'exampleAnswer'   => 'Extra time, oral exams, reading aloud, quiet breaks, a laptop, coloured paper, a specialist...',
        ],

        [
            'question'     => 'What is dyslexia mainly a difficulty with?',
            'openQuestion' => false,
            'answers'      => ['Reading and spelling', 'Seeing colours', 'Hearing sounds'],
            'correct'      => 0,
        ],
        [
            'question'     => 'Roughly how many people worldwide are estimated to have dyslexia?',
            'openQuestion' => false,
            'answers'      => ['1 in 100', '1 in 10', '1 in 3'],
            'correct'      => 1,
        ],
        [
            'question'     => 'Is dyslexia related to low intelligence?',
            'openQuestion' => false,
            'answers'      => ['No, intelligence is unrelated to dyslexia', 'Yes, it lowers IQ', 'Only in young children'],
            'correct'      => 0,
        ],
        [
            'question'     => 'Which area is most associated with dyslexia in the brain?',
            'openQuestion' => false,
            'answers'      => ['Language and phonological processing areas', 'The visual cortex only', 'The cerebellum only'],
            'correct'      => 0,
        ],
        [
            'question'     => 'Can dyslexia be cured?',
            'openQuestion' => false,
            'answers'      => ['No, but it can be well managed with the right support', 'Yes, with medication', 'Yes, it disappears in adulthood'],
            'correct'      => 0,
        ],
        [
            'question'     => 'Is dyslexia hereditary (can it run in families)?',
            'openQuestion' => false,
            'answers'      => ['Yes, it often runs in families', 'No, it is never inherited', 'Only if both parents have it'],
            'correct'      => 0,
        ],
        [
            'question'     => 'Which font is specially designed to be easier to read for people with dyslexia?',
            'openQuestion' => false,
            'answers'      => ['Comic Sans', 'OpenDyslexic', 'Times New Roman'],
            'correct'      => 1,
        ],
        [
            'question'     => 'At what age is dyslexia usually first noticed?',
            'openQuestion' => false,
            'answers'      => ['During early school years when learning to read', 'At birth', 'Only in teenage years'],
            'correct'      => 0,
        ],
        [
            'question'     => 'Which of these is a common myth about dyslexia?',
            'openQuestion' => false,
            'answers'      => ['People with dyslexia just see letters backwards', 'Dyslexia involves phonological difficulties', 'Dyslexia is a recognised learning difference'],
            'correct'      => 0,
        ],
        [
            'question'     => 'What does "phonological awareness" mean in the context of dyslexia?',
            'openQuestion' => false,
            'answers'      => ['The ability to hear and work with the sounds in words', 'The ability to see colours in text', 'Knowing how to hold a pencil correctly'],
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