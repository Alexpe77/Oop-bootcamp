<?php

class Content {
    private $title;
    private $text;

    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }
}

class Article extends Content {
    private $isBreakingNews;

    public function __construct($title, $text, $isBreakingNews = false)
    {
        parent::__construct($title, $text);
        $this->isBreakingNews = $isBreakingNews;
    }

    public function getTitle() {
        $title = parent::getTitle();

        if ($this->isBreakingNews) {
            $title = "BREAKING NEWS: " . $title;
        }

        return $title;
    }
}

$articles = [
    new Article("War in Ukraine", "Russian authorities drop charges against Wagner militia.", true),
    new Article("News Hainaut", "Mons exhibits one of the greatest artists in the world: behind the scenes of the installation of the Jaume Plensa exhibition.")
];

$ads = [
    new Content("Join our mini bootcamp", "W3Schools Bootcamp is the best investment you'll ever made.")
];

$vacancies = [
    new Content("Full Stack Developer", "For different clients involved in the Medical sector, we are looking for Fullstack developers who would be available as soon as possible for a new exciting challenge.")
];

$contentArray = array_merge($articles, $ads, $vacancies);

foreach ($contentArray as $content) {
    $title = $content->getTitle();
    $text = $content->getText();

    if (in_array($content, $ads)) {
        $title = strtoupper($title);
    } elseif (in_array($content, $vacancies)) {
        $title .= " - apply now!";
    }

    // I put this part in comment for last bonus of use-case 3

    // echo "Title: {$title}<br>";
    // echo "Text: {$text}<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oop Bootcamp</title>
</head>
<body>
    <main>
        <?php
            foreach ($contentArray as $content) {
                $title = $content->getTitle();
                $text = $content->getText();

                echo '<div>';

                if ($content instanceof Article) {
                    echo '<article>';
                    echo '<h1>' . htmlspecialchars($title) . '</h1>';
                    echo '</article>';
                } elseif (in_array($content, $ads)) {
                    echo '<article';
                    echo '<h2>' . strtoupper(htmlspecialchars($title)) . '</h2>';
                    echo '</article>';
                } elseif (in_array($content, $vacancies)) {
                    echo '<article';
                    echo '<h3>' . htmlspecialchars($title) . ' - apply now!</h3>';
                    echo '</article>';
                }

                echo '<p>' . htmlspecialchars($text) . '</p>';
                
                echo '</div>';
            }
            ?>
    </main>
</body>
</html>