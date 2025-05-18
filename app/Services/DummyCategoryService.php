<?php

namespace App\Services;

class DummyCategoryService
{
    public static function getCategories()
    {
        return collect([
            [
                'id' => 1,
                'name' => 'Stationery & Art',
                'slug' => 'stationery-art',
                'subcategories' => [
                    ['id' => 101, 'name' => 'Engineering Drawing Components', 'slug' => 'engineering-drawing-components'],
                    ['id' => 102, 'name' => 'Sketch Book', 'slug' => 'sketch-book'],
                    ['id' => 103, 'name' => 'Pencils', 'slug' => 'pencils'],
                    ['id' => 104, 'name' => 'Bags', 'slug' => 'bags'],
                    ['id' => 105, 'name' => 'Polymer Lead for Mechanical Pencil', 'slug' => 'polymer-lead'],
                    ['id' => 106, 'name' => 'Marker Pen', 'slug' => 'marker-pen'],
                    ['id' => 107, 'name' => 'Bag', 'slug' => 'bag'],
                    ['id' => 108, 'name' => 'Flask', 'slug' => 'flask'],
                    ['id' => 109, 'name' => 'Art Canvas', 'slug' => 'art-canvas'],
                    ['id' => 110, 'name' => 'Paint Brushes', 'slug' => 'paint-brushes'],
                ]
            ],
            [
                'id' => 2,
                'name' => 'Robotics',
                'slug' => 'robotics',
                'subcategories' => [
                    ['id' => 201, 'name' => 'Arduino Boards', 'slug' => 'arduino-boards'],
                    ['id' => 202, 'name' => 'Raspberry Pi', 'slug' => 'raspberry-pi'],
                    ['id' => 203, 'name' => 'Sensors', 'slug' => 'sensors'],
                    ['id' => 204, 'name' => 'Motors & Servos', 'slug' => 'motors-servos'],
                    ['id' => 205, 'name' => 'Robot Kits', 'slug' => 'robot-kits'],
                    ['id' => 206, 'name' => 'Batteries & Power', 'slug' => 'batteries-power'],
                    ['id' => 207, 'name' => 'Wires & Connectors', 'slug' => 'wires-connectors'],
                    ['id' => 208, 'name' => 'Display Modules', 'slug' => 'display-modules'],
                    ['id' => 209, 'name' => 'Development Boards', 'slug' => 'development-boards'],
                    ['id' => 210, 'name' => 'Educational Robotics', 'slug' => 'educational-robotics'],
                ]
            ],
            [
                'id' => 3,
                'name' => 'Academic Books',
                'slug' => 'academic-books',
                'subcategories' => [
                    ['id' => 301, 'name' => 'Science Textbooks', 'slug' => 'science-textbooks'],
                    ['id' => 302, 'name' => 'Mathematics', 'slug' => 'mathematics'],
                    ['id' => 303, 'name' => 'Engineering', 'slug' => 'engineering'],
                    ['id' => 304, 'name' => 'Computer Science', 'slug' => 'computer-science'],
                    ['id' => 305, 'name' => 'Business & Economics', 'slug' => 'business-economics'],
                    ['id' => 306, 'name' => 'Medicine & Health Sciences', 'slug' => 'medicine-health'],
                    ['id' => 307, 'name' => 'Law Books', 'slug' => 'law-books'],
                    ['id' => 308, 'name' => 'Architecture & Design', 'slug' => 'architecture-design'],
                    ['id' => 309, 'name' => 'Social Sciences', 'slug' => 'social-sciences'],
                    ['id' => 310, 'name' => 'Research Methodology', 'slug' => 'research-methodology'],
                ]
            ],
            [
                'id' => 4,
                'name' => 'Student Gadgets',
                'slug' => 'student-gadgets',
                'subcategories' => [
                    ['id' => 401, 'name' => 'Calculators', 'slug' => 'calculators'],
                    ['id' => 402, 'name' => 'USB Drives', 'slug' => 'usb-drives'],
                    ['id' => 403, 'name' => 'Laptop Accessories', 'slug' => 'laptop-accessories'],
                    ['id' => 404, 'name' => 'Headphones', 'slug' => 'headphones'],
                    ['id' => 405, 'name' => 'Digital Notebooks', 'slug' => 'digital-notebooks'],
                    ['id' => 406, 'name' => 'Power Banks', 'slug' => 'power-banks'],
                    ['id' => 407, 'name' => 'Study Lamps', 'slug' => 'study-lamps'],
                    ['id' => 408, 'name' => 'Tablet Stands', 'slug' => 'tablet-stands'],
                    ['id' => 409, 'name' => 'E-Readers', 'slug' => 'e-readers'],
                    ['id' => 410, 'name' => 'Wireless Chargers', 'slug' => 'wireless-chargers'],
                ]
            ],
            [
                'id' => 5,
                'name' => 'Art and Crafts',
                'slug' => 'art-crafts',
                'subcategories' => [
                    ['id' => 501, 'name' => 'Paper Holder', 'slug' => 'paper-holder'],
                    ['id' => 502, 'name' => 'Pens', 'slug' => 'pens'],
                    ['id' => 503, 'name' => 'Note Book', 'slug' => 'note-book'],
                    ['id' => 504, 'name' => 'Scissors', 'slug' => 'scissors'],
                    ['id' => 505, 'name' => 'Highlighter Pen', 'slug' => 'highlighter-pen'],
                    ['id' => 506, 'name' => 'Water Bottle', 'slug' => 'water-bottle'],
                    ['id' => 507, 'name' => 'Note Pad', 'slug' => 'note-pad'],
                    ['id' => 508, 'name' => 'Craft Paper', 'slug' => 'craft-paper'],
                    ['id' => 509, 'name' => 'Glue & Adhesives', 'slug' => 'glue-adhesives'],
                    ['id' => 510, 'name' => 'Craft Kits', 'slug' => 'craft-kits'],
                ]
            ],
            [
                'id' => 6,
                'name' => 'English Literature',
                'slug' => 'english-literature',
                'subcategories' => [
                    ['id' => 601, 'name' => 'Classic Novels', 'slug' => 'classic-novels'],
                    ['id' => 602, 'name' => 'Contemporary Fiction', 'slug' => 'contemporary-fiction'],
                    ['id' => 603, 'name' => 'Poetry Collections', 'slug' => 'poetry-collections'],
                    ['id' => 604, 'name' => 'Drama & Plays', 'slug' => 'drama-plays'],
                    ['id' => 605, 'name' => 'Literary Criticism', 'slug' => 'literary-criticism'],
                    ['id' => 606, 'name' => 'Short Story Collections', 'slug' => 'short-story-collections'],
                    ['id' => 607, 'name' => 'Shakespeare Works', 'slug' => 'shakespeare-works'],
                    ['id' => 608, 'name' => 'Literary Essays', 'slug' => 'literary-essays'],
                    ['id' => 609, 'name' => 'Young Adult Literature', 'slug' => 'young-adult-literature'],
                    ['id' => 610, 'name' => 'Literary Reference', 'slug' => 'literary-reference'],
                ]
            ],
            [
                'id' => 7,
                'name' => 'Office Supplies',
                'slug' => 'office-supplies',
                'subcategories' => [
                    ['id' => 701, 'name' => 'Ruler', 'slug' => 'ruler'],
                    ['id' => 702, 'name' => 'Scales', 'slug' => 'scales'],
                    ['id' => 703, 'name' => 'Calculator', 'slug' => 'calculator'],
                    ['id' => 704, 'name' => 'Eraser', 'slug' => 'eraser'],
                    ['id' => 705, 'name' => 'Sharpener', 'slug' => 'sharpener'],
                    ['id' => 706, 'name' => 'Tape', 'slug' => 'tape'],
                    ['id' => 707, 'name' => 'Envelope', 'slug' => 'envelope'],
                    ['id' => 708, 'name' => 'Filing & Storage', 'slug' => 'filing-storage'],
                    ['id' => 709, 'name' => 'Paper Clips & Fasteners', 'slug' => 'paper-clips-fasteners'],
                    ['id' => 710, 'name' => 'Staplers & Punches', 'slug' => 'staplers-punches'],
                ]
            ],
            [
                'id' => 8,
                'name' => 'Educational Tools',
                'slug' => 'educational-tools',
                'subcategories' => [
                    ['id' => 801, 'name' => 'Board and Accessories', 'slug' => 'board-accessories'],
                    ['id' => 802, 'name' => 'Papers', 'slug' => 'papers'],
                    ['id' => 803, 'name' => 'Compass', 'slug' => 'compass'],
                    ['id' => 804, 'name' => 'Life Jacket', 'slug' => 'life-jacket'],
                    ['id' => 805, 'name' => 'Binocular', 'slug' => 'binocular'],
                    ['id' => 806, 'name' => 'Stapler', 'slug' => 'stapler'],
                    ['id' => 807, 'name' => 'Sticky Notes', 'slug' => 'sticky-notes'],
                    ['id' => 808, 'name' => 'Maps & Globes', 'slug' => 'maps-globes'],
                    ['id' => 809, 'name' => 'Educational Posters', 'slug' => 'educational-posters'],
                    ['id' => 810, 'name' => 'Lab Equipment', 'slug' => 'lab-equipment'],
                ]
            ],
        ]);
    }
}
