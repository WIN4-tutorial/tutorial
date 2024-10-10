<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Überprüfen, ob die Datei hochgeladen wurde
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $title = htmlspecialchars($_POST['title']); // Titel aus dem Formular
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        
        // Pfad zum Speichern der Datei
        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $fileName;

        // Verzeichnis erstellen, falls es nicht existiert
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }

        // Datei verschieben
        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            echo 'Datei erfolgreich hochgeladen.';
            // Hier kannst du den Titel und den Dateipfad in eine Datenbank speichern oder eine Bestätigung anzeigen
            echo "<p>Titel: $title</p>";
            echo "<p>Datei: <a href='$dest_path'>$fileName</a></p>";
        } else {
            echo 'Ein Fehler ist beim Hochladen der Datei aufgetreten.';
        }
    } else {
        echo 'Keine Datei hochgeladen oder Fehler beim Upload.';
    }
} else {
    echo 'Ungültige Anfrage.';
}
?>
