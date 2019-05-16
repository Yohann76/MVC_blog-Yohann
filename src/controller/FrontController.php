<?php

namespace App\src\controller;

class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home', [
            'articles' => $articles
        ]);
    }


    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);

        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function displayBlog() {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('blog', [
            'articles' => $articles
        ]);
    }

    public function connection() {
        return $this->view->render('connection', [
        ]);
    }

    public function Déconnexion()
    {
        $this->session->stop() ;
        header('Location: ../public/index.php?route=connection');
    }

    // Download CV
    public function downloadCv()
    {
        $full_path = '../public/cv.pdf';
        $file_name = basename($full_path);

        ini_set('zlib.output_compression', 0);
        $date = gmdate(DATE_RFC1123);

        header('Pragma: public');
        header('Cache-Control: must-revalidate, pre-check=0, post-check=0, max-age=0');

        header('Content-Tranfer-Encoding: none');
        header('Content-Length: '.filesize($full_path));
        header('Content-MD5: '.base64_encode(md5_file($full_path)));
        header('Content-Type: application/octetstream; name="'.$file_name.'"');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');

        header('Date: '.$date);
        header('Expires: '.gmdate(DATE_RFC1123, time()+1));
        header('Last-Modified: '.gmdate(DATE_RFC1123, filemtime($full_path)));

        readfile($full_path);
        exit;
    }

}