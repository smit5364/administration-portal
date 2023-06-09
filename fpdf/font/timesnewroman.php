<?php

// Define the font name, style, and encoding
$fontname = 'TimesNewRoman';
$fontstyle = '';
$encoding = 'CP1252';

// Open the font file
$fontfile = fopen('timesnewroman.ttf', 'rb');

// Read the font file into a string
$fontdata = fpassthru($fontfile);

// Close the font file
fclose($fontfile);

// Add the font to FPDF
$pdf->AddFont($fontname, $fontstyle, $fontdata);

?>