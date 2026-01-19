<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutSection::truncate();

        $sections = [
            // ACwO
            [
                'section_type' => 'experience',
                'title' => 'Assistant Tech Lead',
                'company' => 'ACwO (Mobilla’s Sister Company)',
                'duration' => 'Apr 2023 – Present • Mumbai',
                'description' => "Leading technical initiatives and directly collaborating with the CTO on system design.
<ul>
    <li>Lead developer for digital signature onboarding systems and sales data platforms.</li>
    <li>Collaborated with Sales, HR, and Finance to design automation solutions, reducing manual effort by 30%.</li>
    <li>Created Power BI dashboards for key performance indicators (KPIs).</li>
    <li>Mentored junior engineers and conducted code reviews to ensure code quality.</li>
</ul>",
                'order' => 1,
            ],
            // Mobilla
            [
                'section_type' => 'experience',
                'title' => 'Full Stack Developer & Project Coordinator',
                'company' => 'Mobilla',
                'duration' => 'Dec 2022 – Apr 2023 • Mumbai',
                'description' => "<ul>
    <li>Developed web applications using Laravel, PHP, and custom APIs for Instagram integration.</li>
    <li>Implemented ERP workflow automations, cutting sales order processing time.</li>
    <li>Coordinated with third-party vendors and managed insourcing of technical projects.</li>
</ul>",
                'order' => 2,
            ],
            // Tritorc
            [
                'section_type' => 'experience',
                'title' => 'Web Developer',
                'company' => 'Tritorc',
                'duration' => 'Mar 2022 – Nov 2022 • Thane',
                'description' => "<ul>
    <li>Built a lead generation website incorporating 3D rendering for improved engagement.</li>
    <li>Applied advanced SEO practices, boosting inbound leads by 30X.</li>
    <li>Optimized database schemas for performance at scale.</li>
</ul>",
                'order' => 3,
            ],
            // Ziroh Labs
            [
                'section_type' => 'experience',
                'title' => 'Java Developer (Project)',
                'company' => 'Ziroh Labs',
                'duration' => '2021',
                'description' => "<ul>
    <li>Developed a Cloud File System (CFS) using Java Maven and Dropbox SDK with encryption.</li>
    <li>Delivered project ahead of schedule, reducing release cycle by 20%.</li>
</ul>",
                'order' => 4,
            ],
            // Education
            [
                'section_type' => 'education',
                'title' => 'MCA',
                'company' => 'Pune University',
                'duration' => '2022',
                'description' => 'Master of Computer Applications',
                'order' => 1,
            ],
            [
                'section_type' => 'education',
                'title' => 'B.Sc. Computer Science',
                'company' => 'Mumbai University',
                'duration' => '2019',
                'description' => 'Bachelor of Science in Computer Science',
                'order' => 2,
            ]
        ];

        foreach ($sections as $section) {
            AboutSection::create($section);
        }
    }
}
