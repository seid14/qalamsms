<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'studentName' => 'Abdi Hassan',
                'studentEmail' => 'abdi.hassan@example.com'
            ],
            [
                'studentName' => 'Fadumo Ali',
                'studentEmail' => 'fadumo.ali@example.com'
            ],
            [
                'studentName' => 'Mohamed Yusuf',
                'studentEmail' => 'mohamed.yusuf@example.com'
            ],
            [
                'studentName' => 'Amina Ibrahim',
                'studentEmail' => 'amina.ibrahim@example.com'
            ],
            [
                'studentName' => 'Hassan Omar',
                'studentEmail' => 'hassan.omar@example.com'
            ],
            [
                'studentName' => 'Sahra Ahmed',
                'studentEmail' => 'sahra.ahmed@example.com'
            ],
            [
                'studentName' => 'Ismail Farah',
                'studentEmail' => 'ismail.farah@example.com'
            ],
            [
                'studentName' => 'Maryan Jama',
                'studentEmail' => 'maryan.jama@example.com'
            ],
            [
                'studentName' => 'Yusuf Abdi',
                'studentEmail' => 'yusuf.abdi@example.com'
            ],
            [
                'studentName' => 'Halima Mohamed',
                'studentEmail' => 'halima.mohamed@example.com'
            ],
            [
                'studentName' => 'Omar Said',
                'studentEmail' => 'omar.said@example.com'
            ],
            [
                'studentName' => 'Khadija Aden',
                'studentEmail' => 'khadija.aden@example.com'
            ],
            [
                'studentName' => 'Ahmed Nur',
                'studentEmail' => 'ahmed.nur@example.com'
            ],
            [
                'studentName' => 'Laila Osman',
                'studentEmail' => 'laila.osman@example.com'
            ],
            [
                'studentName' => 'Abdullahi Shire',
                'studentEmail' => 'abdullahi.shire@example.com'
            ],
            [
                'studentName' => 'Naima Guled',
                'studentEmail' => 'naima.guled@example.com'
            ],
            [
                'studentName' => 'Said Bashir',
                'studentEmail' => 'said.bashir@example.com'
            ],
            [
                'studentName' => 'Zahra Haji',
                'studentEmail' => 'zahra.haji@example.com'
            ],
            [
                'studentName' => 'Ibrahim Adan',
                'studentEmail' => 'ibrahim.adan@example.com'
            ],
            [
                'studentName' => 'Fatima Dirie',
                'studentEmail' => 'fatima.dirie@example.com'
            ]
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
