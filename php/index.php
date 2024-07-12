<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Bookstore</h1>
        </div>
        <nav class="navigate">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        
        <br><br><br>

        <section class="featured-books">
            <h2>Featured Books</h2>
            <div class="books">
                <?php
                // Sample array of books
                $books = [
                    ["title" => "Hacking The Art Of Exploitation", "author" => "Jon Erikson", "image" => "../images/img1.jpg","price"=>'$70'],
                    ["title" => "The Web Application Handbook", "author" => "Dafydd Stuttard", "image" => "../images/img2.jpg","price"=>'$50'],
                    ["title" => "Web Hacking 101", "author" => "Pete Yaworski", "image" => "../images/img3.jpg","price"=>'$40'],
                    ["title" => "Hacking The Art Of Exploitation", "author" => "Jon Erikson", "image" => "../images/img1.jpg","price"=>'$70'],
                    ["title" => "The Web Application Handbook", "author" => "Dafydd Stuttard", "image" => "../images/img2.jpg","price"=>'$50'],
                    
                ];

                foreach ($books as $book) {
                    echo "<div class='book'>
                            <img src='{$book['image']}' alt='{$book['title']}'>
                            <h3>{$book['title']}</h3>
                            <p>{$book['author']}</p>
                            <h4>{$book['price']}</h4>
                          </div>";
                }
                ?>
            </div>
        </section>

        <section class="categories">
            <h2>Categories</h2>
            <div class="category-list">
                <div class="category">
                    <h3>Fiction</h3>
                </div>
                <div class="category">
                    <h3>Non-Fiction</h3>
                </div>
                <div class="category">
                    <h3>Science</h3>
                </div>
                <div class="category">
                    <h3>Biography</h3>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Bookstore. All rights reserved.</p>
    </footer>
</body>
</html>
