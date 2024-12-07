<?php

use App\Http\Controllers\Admin\Extensions\Eco\EcosystemController;
use App\Http\Controllers\Admin\Extensions\Eco\TokensController;
use App\Http\Controllers\Admin\Extensions\Eco\AddressesController;
use App\Http\Controllers\Admin\Extensions\Eco\MarketsController;
use App\Http\Controllers\Admin\Extensions\Eco\MasterWalletController;
use App\Http\Controllers\Admin\Extensions\Eco\WithdrawalController;
use App\Http\Controllers\Admin\Extensions\Eco\FeesController;
use App\Http\Controllers\Admin\Extensions\Eco\UTXOController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'eco', 'as' => 'eco.'], function () {
    Route::group(['prefix' => 'blockchains', 'as' => 'blockchain.'], function () {
        Route::get('', [EcosystemController::class, 'blockchain'])->name('index');

        Route::group(['middleware' => 'demo', 'prefix' => '{chain}'], function () {
            Route::group(['prefix' => 'wallet', 'as' => 'wallet.'], function () {
                Route::get('', [MasterWalletController::class, 'wallet'])->name('index');
                Route::get('/create', [MasterWalletController::class, 'store'])->name('create');
                Route::post('/add/mnemonic', [MasterWalletController::class, 'addMnemonic'])->name('add.mnemonic');
                Route::post('/add/xpub', [MasterWalletController::class, 'addXpub'])->name('add.xpub');
                Route::post('/add/privateKey', [MasterWalletController::class, 'addPrivateKey'])->name('add.privateKey');
                Route::post('/add', [MasterWalletController::class, 'add'])->name('add');
                Route::post('/remove', [MasterWalletController::class, 'delete'])->name('remove');
                Route::post('/encryptData', [MasterWalletController::class, 'encryptData'])->name('encryptData');
            });

            Route::group(['prefix' => 'tokens', 'as' => 'tokens.'], function () {
                Route::get('', [TokensController::class, 'tokens'])->name('index');
                Route::get('/new', [TokensController::class, 'tokens_new'])->name('new');
                Route::post('/store/{id}', [TokensController::class, 'tokens_store'])->name('store');
                Route::post('/update/{id}', [TokensController::class, 'tokens_update'])->name('update');
                Route::post('/updateStatus', [TokensController::class, 'token_update_status'])->name('update.status');
                Route::post('/remove', [TokensController::class, 'tokens_remove'])->name('remove');

                Route::post('/register', [TokensController::class, 'token_register'])->name('register');
                Route::get('/fetch/contract/{id}', [TokensController::class, 'token_smart_contract_fetch'])->name('fetch.contract');
                Route::post('/add/contract', [TokensController::class, 'token_smart_contract_add'])->name('add.contract');
                Route::get('/sync/{id}', [TokensController::class, 'token_sync'])->name('sync');
                Route::post('/add/icon', [TokensController::class, 'add_icon'])->name('add.icon');
                Route::post('/deploy', [TokensController::class, 'token_deploy'])->name('deploy');
                Route::post('/add', [TokensController::class, 'token_add'])->name('add');
                Route::post('/withdraw/settings/{isMainnet?}', [TokensController::class, 'token_withdraw_settings'])->name('withdraw.settings');
                Route::post('/fees/account/create', [TokensController::class, 'token_fees_account_create'])->name('fees.account.create');
            });

            Route::group(['prefix' => '/fees', 'as' => 'fees.'], function () {
                Route::get('/', [FeesController::class, 'index'])->name('index');
                Route::post('/withdraw', [FeesController::class, 'withdraw'])->name('withdraw');
            });

            Route::group(['prefix' => 'mainnet_tokens', 'as' => 'mainnet.tokens.'], function () {
                Route::get('', [TokensController::class, 'mainnet_tokens'])->name('index');
            });

            Route::group(['prefix' => '/{currency}/addresses', 'as' => 'addresses.'], function () {
                Route::get('/', [AddressesController::class, 'index'])->name('index');
                Route::get('/store', [AddressesController::class, 'store'])->name('store');
                Route::get('/activate/{id}', [AddressesController::class, 'activate'])->name('activate');
                Route::get('/activate/check/{id}', [AddressesController::class, 'verify'])->name('verify');
            });

            Route::group(['prefix' => '/utxo', 'as' => 'utxo.'], function () {
                Route::get('/', [UTXOController::class, 'index'])->name('index');
                Route::post('/store', [UTXOController::class, 'store'])->name('store');
                Route::post('/clean', [UTXOController::class, 'clean'])->name('clean');
                Route::post('/encryptData', [UTXOController::class, 'encryptData'])->name('encryptData');
            });

            Route::get('/{currency}/withdrawal', [WithdrawalController::class, 'index'])->name('withdrawal.index');
        });
    });

    Route::group(['prefix' => 'markets', 'as' => 'markets.'], function () {
        Route::get('', [MarketsController::class, 'index'])->name('index');
        Route::post('/store', [MarketsController::class, 'store'])->name('store');
        Route::post('/update', [MarketsController::class, 'update'])->name('update');
    });

    // transaction
    Route::group(['prefix' => 'transactions', 'as' => 'transactions.'], function () {
        Route::get('', [EcosystemController::class, 'transactions'])->name('index');
        Route::get('/{id}', [EcosystemController::class, 'transaction'])->name('show');
    });
});
