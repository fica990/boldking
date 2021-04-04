<?php


namespace App\Utility;


class CSVDataExport implements DataExportInterface
{
    public function exportData(array $data)
    {
        $out = fopen('php://output', 'w');

        foreach ($data as $row) {
            fputcsv($out, $row);
        }

        fclose($out);
    }

}
