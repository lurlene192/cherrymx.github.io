<?php
define('ROOT' , $_SERVER['DOCUMENT_ROOT']);
include ROOT.'/core/zefox.php';

$filename = check($_GET['file']);
 
 if( $filename == "" )
{
          echo "������: �� ������� ��� �����.";
          exit;
} elseif ( ! file_exists( $filename ) ) // ��������� ���������� �� ��������� ����
{
          echo "������: ������� ����� �� ����������.";
          exit;
};
 
 // ����� ��� Internet Explorer, ����� Content-Disposition ������������
if(ini_get('zlib.output_compression'))ini_set('zlib.output_compression', 'Off');
$file_extension = strtolower(substr(strrchr($filename,"."),1));

header("Pragma: public"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // ����� ��� ��������� ���������
header("Content-Type: application/zip");
header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename)); // ���������� �������� ������� ������� ����� �� ����������� ����
readfile("$filename");
exit();