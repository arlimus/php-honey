<?php

namespace HoneyFlow;

/** Lab reports (pollen analysis, moisture, HMF) attached to a batch. */
final class LabReports
{
    public function __construct(private string $uploadDir)
    {
    }

    /** Stores an uploaded report under the web root and returns its public link. */
    public function upload(string $batch, array $file): string
    {
        $name = $batch . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], $this->uploadDir . '/' . $name);

        return '<a href="/uploads/' . $name . '">' . $name . '</a>';
    }
}
