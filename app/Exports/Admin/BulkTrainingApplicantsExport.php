<?php

namespace App\Exports\Admin;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BulkTrainingApplicantsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithDrawings
{
    protected $trainingForm;

    public function __construct($trainingForm)
    {
        $this->trainingForm = $trainingForm;
    }

    public function collection()
    {
        return $this->trainingForm->trainingFormApplication;
    }

    public function headings(): array
    {
        return ['#', 'Profile Picture', 'Full Name', 'Registration Number', 'Designation', 'Gender', 'Date of Birth', 'Citizenship No.', 'Contact', 'Email', 'Position', 'Status', 'Applied At', 'Training Form'];
    }

    public function map($form): array
    {
        $fullName = trim($form->first_name . ' ' . $form->middle_name . ' ' . $form->last_name);

        return [$form->id, '', $fullName, $form->registration_number ?? 'N/A', $form->designation, $form->gender, $form->dob, $form->citizenship_number, $form->contact_number, $form->email, $form->position, ucfirst($form->status), $form->created_at->format('d M Y'), $form->npcTrainingForm->name ?? 'N/A'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function drawings()
    {
        $drawings = [];
        $applications = $this->trainingForm->trainingFormApplication;

        foreach ($applications as $index => $form) {
            $path = $form->getFirstMediaPath('profile_photo'); // Use the correct media collection name here
            if ($path && file_exists($path)) {
                $drawing = new Drawing();
                $drawing->setName('Profile Picture');
                $drawing->setDescription('Profile Picture');
                $drawing->setPath($path);
                $drawing->setHeight(50); // Adjust height as needed
                // Images start from row 2, column B
                $rowNumber = $index + 2; // Starting from row 2
                $drawing->setCoordinates('B' . $rowNumber);
                $drawings[] = $drawing;
            }
        }

        return $drawings;
    }
}
