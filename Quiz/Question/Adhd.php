<?php
function get_questions() {
    $questions = [
        [
            'question'     => 'Waar staat ADHD?',
            'openQuestion' => false,
            'answers'      => [
                'Attention deficit hyperactivity disorder',
                'Advanced hyperactive development disorder',
                'Attention deficit high disorder',
                'Advanced hippo development disorder',
            ],
            'correct'      => 0, // dit is om te zien welke antwoordt correct is
        ],
        [
            'question'     => 'Welke kenmerken komen vaak voor bij ADHD?',
            'openQuestion' => false,
            'answers'      => [
                'Hoesten',
                'Random Onbewust bewegingen',
                'Moeite met opletten',
                'Dansen',
            ],
            'correct'      => 2,
        ],

        [
            'question'     => 'Wanneer wordt ADHD meestal vastgesteld?',
            'openQuestion' => false,
            'answers'      => [
                'Babytijd',
                'Rond 12 jaar',
                'Kindertijd',
                'Allen als je volwassen bent',
            ],
            'correct'      => 2,
        ],

        [
            'question'     => 'Wat is een officiële types ADHD?',
            'openQuestion' => false,
            'answers'      => [
                'Emotioneel type',
                'Onoplettend type',
                'Creatif type',
                'Sociaal type',
            ],
            'correct'      => 1,
        ],

        [
            'question'     => 'ADHD kan doorgaan tot in - ?',
            'openQuestion' => false,
            'answers'      => [
                'tot alleen in de kindertijd',
                'tot hoge leeftijd',
                'tot in de volwassenheid',
                'tot de maan en de zon handtje vast houden',
            ],
            'correct'      => 2,
        ],

        [
            'question'     => 'Hoe kan ADHD verschillen tussen mensen?',
            'openQuestion' => false,
            'answers'      => [
                'Het verschilt per leeftijdsgroep',
                'Het hangt alleen af van intelligentie',
                'Het ziet er bij iedereen hetzelfde uit',
            ],
            'correct'      => 0,
        ],

        [
            'question'     => 'Wat is een mogelijk oorzaak van ADHD zijn?',
            'openQuestion' => false,
            'answers'      => [
                'Veel lezen',
                'Te weinig slaap',
                'Veshil in hersenontwikkeling',
                'Grotere hersenen',
            ],
            'correct'      => 2,
        ],


        [
            'question'     => 'Wat klopt over erfelijkheid en ADHD?',
            'openQuestion' => false,
            'answers'      => [
                'Het heeft niets met genen te maken',
                'Het wordt door een bepaalde gen veroorzaakt',
                'Als je iemand zoent met ADHD dan krijg je ADHD',
                'Meerdere genen kunnen een rol spelen ',
            ],
            'correct'      => 3,
        ],

        [
            'question'     => 'Wat kan het risico op ADHD verhogen',
            'openQuestion' => false,
            'answers'      => [
                'Je been breken',
                'Veel stress thuis',
                'Iemand met ADHD zoenen',
                'Je rug breken',
            ],
            'correct'      => 1,
        ],

        [
            'question'     => 'Leg in eigen woorden uit wat ADHD is.',
            'openQuestion' => true,
            'minimumKeywords' => 3,
            'keywords'     => [
                'lawaai','geluid','licht','fel','textuur','aanraking','geur',
                'drukte','menigte','temperatuur',
            ],
            'exampleAnswer' => 'Hard geluid, felle lichten en onprettige kledingsstof.',
        ],


        [
            'question'     => 'Noem drie types ADHD en leg ze kort uit',
            'openQuestion' => true,
            'minimumKeywords' => 3,
            'keywords'     => [
                'onoplettend','inattentive','hyperactief','gecombineerd','combined','hyperactive','combinatie van beide',

            ],
            'exampleAnswer' => 'Combined:  een combinatie van de twee',
        ],

        [
            'question'     => 'Wat betekent "impulsief gedrag bij ADHD ',
            'openQuestion' => false,
            'answers'      => [
                'Nooit fouten maken',
                'Je put puls in ',
                'Iets doen zonder na te denken',
                'Je rug breken',
            ],
            'correct'      => 2,
        ],

        [
            'question'     => 'Hoe kan ADHD invloed hebben op het dagelijk leven?',
            'openQuestion' => true,
            'minimumKeywords' => 3,
            'keywords'     => [
                'concentreren','stilzitten','samenwerken','moeite hebben met opdrachten afmaken',

            ],
            'exampleAnswer' => 'Moeite hebben met opdrachten',
        ],


        [
            'question'     => 'Wat was de oude naam van inattentive type van ADHD',
            'openQuestion' => true,
            'minimumKeywords' => 1,
            'keywords'     => [
                'ADD','Attention Deficit Disorder',

            ],
            'exampleAnswer' => 'ADD',
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