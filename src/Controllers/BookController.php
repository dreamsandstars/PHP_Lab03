<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;

class BookController
{
    public function index(): void
    {
        $books = $this->getBooks();
        $search = trim($_GET['search'] ?? '');
        $category = trim($_GET['category'] ?? '');

        // 1. Search filter
        if ($search !== '') {
            $books = array_filter($books, function (array $book) use ($search) {
                return mb_stripos($book['title'], $search) !== false || 
                       mb_stripos($book['isbn'], $search) !== false ||
                       mb_stripos($book['author'], $search) !== false;
            });
        }

        // 2. Category filter
        if ($category !== '') {
            $books = array_filter($books, function (array $book) use ($category) {
                return strcasecmp($book['category'], $category) === 0;
            });
        }

        // Collect all distinct categories for the filter dropdown
        $allBooks = $this->getBooks();
        $categories = array_unique(array_map(function (array $book) {
            return $book['category'];
        }, $allBooks));

        Response::view('books/index', [
            'title' => 'Book Catalog',
            'books' => array_values($books),
            'categories' => $categories,
            'selectedCategory' => $category,
            'searchQuery' => $search,
            'created' => ($_GET['created'] ?? '') === '1'
        ]);
    }

    public function show(string $isbn): void
    {
        $books = $this->getBooks();
        $book = null;

        foreach ($books as $b) {
            if ($b['isbn'] === $isbn) {
                $book = $b;
                break;
            }
        }

        if ($book === null) {
            Response::notFound('Book with ISBN ' . htmlspecialchars($isbn) . ' not found.');
        }

        Response::view('books/show', [
            'title' => $book['title'],
            'book' => $book
        ]);
    }

    public function create(): void
    {
        Response::view('books/create', [
            'title' => 'Add New Book',
            'error' => null
        ]);
    }

    public function store(): void
    {
        $isbn = trim($_POST['isbn'] ?? '');
        $title = trim($_POST['title'] ?? '');
        $category = trim($_POST['category'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $price = (int) ($_POST['price'] ?? 0);
        $quantity = (int) ($_POST['quantity'] ?? 0);

        if ($isbn === '' || $title === '' || $category === '' || $author === '' || $price <= 0 || $quantity < 0) {
            Response::view('books/create', [
                'title' => 'Add New Book',
                'error' => 'Please enter all fields (ISBN, Title, Category, Author, Price, Quantity) correctly.'
            ], 422);
        }

        $books = $this->getBooks();

        // Check if ISBN already exists
        foreach ($books as $b) {
            if ($b['isbn'] === $isbn) {
                Response::view('books/create', [
                    'title' => 'Add New Book',
                    'error' => 'A book with this ISBN already exists.'
                ], 422);
            }
        }

        // Generate ID
        $maxId = 0;
        foreach ($books as $b) {
            if ($b['id'] > $maxId) {
                $maxId = $b['id'];
            }
        }

        $newBook = [
            'id' => $maxId + 1,
            'isbn' => $isbn,
            'title' => $title,
            'category' => $category,
            'author' => $author,
            'price' => $price,
            'quantity' => $quantity
        ];

        $books[] = $newBook;
        $this->saveBooks($books);

        Response::redirect('/books?created=1');
    }

    public function apiIndex(): void
    {
        $books = $this->getBooks();
        Response::json(200, $books);
    }

    public function apiSearch(): void
    {
        $books = $this->getBooks();
        $q = trim($_GET['q'] ?? '');

        if ($q !== '') {
            $books = array_filter($books, function (array $book) use ($q) {
                return mb_stripos($book['title'], $q) !== false || 
                       mb_stripos($book['isbn'], $q) !== false ||
                       mb_stripos($book['author'], $q) !== false;
            });
        }

        Response::json(200, array_values($books));
    }

    private function getBooks(): array
    {
        $path = dirname(__DIR__) . '/Data/books.json';
        if (!file_exists($path)) {
            return [];
        }
        return json_decode(file_get_contents($path), true) ?: [];
    }

    private function saveBooks(array $books): void
    {
        $path = dirname(__DIR__) . '/Data/books.json';
        file_put_contents($path, json_encode($books, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
