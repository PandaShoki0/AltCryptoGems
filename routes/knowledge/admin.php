<?php

use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'knowledge', 'as' => 'knowledge.'],
    function () {
        // Categories
        Route::delete('categories/destroy', 'Extensions\KnowledgeBase\CategoriesController@massDestroy')->name('categories.massDestroy');
        Route::resource('categories', 'Extensions\KnowledgeBase\CategoriesController');

        // Tags
        Route::delete('tags/destroy', 'Extensions\KnowledgeBase\TagsController@massDestroy')->name('tags.massDestroy');
        Route::resource('tags', 'Extensions\KnowledgeBase\TagsController');

        // Articles
        Route::delete('articles/destroy', 'Extensions\KnowledgeBase\ArticlesController@massDestroy')->name('articles.massDestroy');
        Route::resource('articles', 'Extensions\KnowledgeBase\ArticlesController');

        // Faq Categories
        Route::delete('faq-categories/destroy', 'Extensions\KnowledgeBase\FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
        Route::resource('faq-categories', 'Extensions\KnowledgeBase\FaqCategoryController');

        // Faq Questions
        Route::delete('faq-questions/destroy', 'Extensions\KnowledgeBase\FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
        Route::resource('faq-questions', 'Extensions\KnowledgeBase\FaqQuestionController');
    }
);
