<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Attributes\TargetRepository;
use Core\Attributes\Table;

#[Table(name: 'book')]
#[TargetRepository(repoName: BookRepository::class)]
class Book
{
 private int $id;
 private string $title;
 private string $author;
 public function getId(): ?int
 {
     return $this->id;
 }
 public function getTitle(): ?string
 {
     return $this->title;
 }
 public function setTitle(string $title): self
 {
     $this->title = $title;
 }
 public function getAuthor(): ?string
 {
     return $this->author;
 }
 public function setAuthor(string $author): self
 {
     $this->author = $author;
 }

}