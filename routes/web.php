<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MapUserController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UniteController;
use App\Http\Middleware\AppAdmin;
use App\Http\Middleware\guest;
use App\Http\Middleware\GuestAdmin;
use App\Http\Middleware\AppUser;

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, "register"]);
});
Route::get('/api/hopitaux', [MapController::class, 'listHospital']);
Route::get('/api/base', [MapController::class, 'listBase']);
Route::get('/api/missions', [MapController::class, 'listMission']);
Route::post('/api/add-mission', [MapUserController::class, 'addUserMission']);
Route::post('/api/update-mission', [MapUserController::class, 'updateUserMission']);
Route::get('/api/get-mission', [MapUserController::class, 'missionList']);
Route::post('/api/update-unite-user', [MapUserController::class, 'updateUniteUser']);
Route::post("/api/send-message", [ChatController::class, "SendMessage"]);
Route::get("/api/base/{id}", [MapController::class, "getBaseById"]);
Route::get("/api/hopital/{id}", [MapController::class, "getHospitalById"]);
Route::post("/api/send-message-user", [ChatController::class, "SendMessageUser"]);
Route::get("/api/load-message", [ChatController::class, "LoadThePreviousMessages"]);
Route::get("/api/unite-user/{id}", [MapUserController::class, "getUniteUserById"]);
Route::get("/api/unite/{id}", [MapUserController::class, "getUniteById"]);

Route::group(['prefix' => 'dashboard', 'middleware' => AppUser::class], function () {
    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/boutique', [FrontendController::class, 'marketView']);
    Route::get('/boutique/unites', [FrontendController::class, 'marketUniteView']);
    Route::get('/boutique/personnels', [FrontendController::class, 'marketPersonnelView']);
    Route::get('/elements', [FrontendController::class, 'elementView']);
    Route::get('/elements/unite/{id}', [FrontendController::class, 'elementItemView']);
    Route::get('/elements/personnel/{id}', [FrontendController::class, 'elementItemPersonnelView']);
    // Route::get('/boutique', function () {
    //     return view('dashboard.boutique');
    // });
    Route::get('/jeu', [MapUserController::class, 'index']);
    Route::get('/classement', [FrontendController::class, 'viewClassement']);
    Route::get('/alliances', [FrontendController::class, 'alliancesView']);
    Route::get('/alliance/{id}', [FrontendController::class, 'allianceView']);
    Route::get('/echange/{id}', [FrontendController::class, 'exchangeUniteView']);
    Route::get('/statistique', function () {
        return view('dashboard.statistique');
    });
    Route::get('/deconnexion', [AuthController::class, 'userLogout'])->name('logoutUser');

    Route::group(['prefix' => 'api', 'middleware' => AppUser::class], function () {
        Route::post('/add-event-user', [FrontendController::class, 'addEventUser'])->name('add.event-user');
        Route::post('/add-clan', [FrontendController::class, 'addClan'])->name('add.clan');
        Route::get('/get-demande', [FrontendController::class, 'getDemandeUnite'])->name('get.demande');
        Route::get('/accept-demande/{id}', [FrontendController::class, 'acceptUniteExchange']);
        Route::get('/reject-demande/{id}', [FrontendController::class, 'rejectDemande']);
        Route::post('/init-demande', [FrontendController::class, 'initUniteExchange'])->name('init.demande');
        Route::get('/delete-clan/{id}', [FrontendController::class, 'destroyAlliance']);
        Route::post('/update-clan', [FrontendController::class, 'updateClan'])->name('update.clan');
        Route::post('/search-clan', [FrontendController::class, 'searchClan'])->name('search.clan');
        Route::post('/add-clan-user', [FrontendController::class, 'addClanUser'])->name('add.clan-user');
        Route::post('/update-unite', [FrontendController::class, 'updateUniteUser'])->name('update.unite-user');
        Route::post('/add-personnel-formation', [FrontendController::class, 'addPersonnelFormation'])->name('add.personnel-formation');
        Route::post('/add-unite-user', [FrontendController::class, 'addUniteUser'])->name('add.unite-user');
        Route::post('/add-personnel-user', [FrontendController::class, 'addPersonnelUser'])->name('add.personnel-user');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => GuestAdmin::class], function () {
        Route::get('/connexion', function () {
            return view('admin.auth.login');
        });
        Route::post('/connexion', [AuthController::class, "loginAdmin"])->name('admin-connexion');
        Route::get('/', function () {
            return view('admin.auth.login');
        });
        Route::get('/mot-passe-oublie', function () {
            return view('admin.auth.forgot');
        });
    });
    Route::group(['prefix' => 'api', 'middleware' => AppAdmin::class], function () {
        Route::post('/add-evenement', [EventController::class, 'store'])->name('add.event');
        Route::post('/add-unite', [UniteController::class, 'store'])->name('add.unite');
        Route::post('/edit-unite', [UniteController::class, 'update'])->name('edit.unite');
        Route::get('/delete-unite/{id}', [UniteController::class, 'delete']);
        Route::post('/add-type-unite', [UniteController::class, 'storeTypeUnite'])->name('add.typeUnite');
        Route::post('/edit-type-unite', [UniteController::class, 'updateTypeUnite'])->name('edit.typeUnite');
        Route::get('/delete-type-unite/{id}', [UniteController::class, 'deleteTypeUnite']);
        Route::post('/edit-evenement', [EventController::class, 'update'])->name('edit.event');
        Route::get('/delete-evenement/{id}', [EventController::class, 'delete']);
        Route::post('/add-type-base', [BaseController::class, 'store'])->name('add.typebase');
        Route::post('/add-base-user', [MapController::class, 'storeBase'])->name('add.base');
        Route::post('/banned', [UserController::class, 'bannedUser'])->name('banned.user');
        Route::post('/add-mission', [MissionController::class, 'store'])->name('add.mission');
        Route::post('/edit-mission', [MissionController::class, 'update'])->name('edit.mission');
        Route::get('/delete-mission/{id}', [MissionController::class, 'delete']);
        Route::post('/add-personnel', [FormationController::class, 'storePersonnel'])->name('add.personnel');
        Route::post('/edit-personnel', [FormationController::class, 'updatePersonnel'])->name('edit.personnel');
        Route::get('/delete-personnel/{id}', [FormationController::class, 'deletePersonnel']);
        Route::post('/add-formation', [FormationController::class, 'storeFormation'])->name('add.formation');
        Route::post('/edit-formation', [FormationController::class, 'updateFormation'])->name('edit.formation');
        Route::get('/delete-formation/{id}', [FormationController::class, 'deleteFormation']);
        Route::post('/add-hopital', [MapController::class, 'storeHopital'])->name('add.hopital');
        Route::post('/edit-hopital', [MapController::class, 'updateHopital'])->name('edit.hopital');
        Route::get('/delete-hopital/{id}', [MapController::class, 'deleteHopital']);
        Route::get('/hopitaux', [MapController::class, 'listHopital']);
    });
    Route::group(['prefix' => 'dashboard', 'middleware' => AppAdmin::class], function () {

        Route::get('/', [AdminController::class, "index"]);
        Route::get('/joueurs', [UserController::class, 'index']);
        Route::get('/joueur/{id}', [UserController::class, 'detailUser']);
        Route::get('/evenements', [EventController::class, 'index']);
        Route::get('/evenement/{id}', [EventController::class, 'show']);
        Route::get('/personnels', [FormationController::class, 'index']);
        Route::get('/unites', [UniteController::class, 'index']);
        Route::get('/type-unite', [UniteController::class, 'typeUniteView']);
        Route::get('/formations', [FormationController::class, 'formation']);
        Route::get('/hopitaux', [BaseController::class, 'hospitalList']);
        Route::get('/chatlog', [ChatController::class, 'index']);
        Route::get('/parametre_general', [SettingController::class, 'generalSetting']);
        Route::get('/parametre_boutique', [SettingController::class, 'boutiqueSetting']);
        Route::get('/parametre_chat', [SettingController::class, 'chatView']);
        Route::get('/personnel/{id}', [FormationController::class, 'detail']);
        Route::get('/missions', [MissionController::class, 'index']);
        Route::get('/mission/{id}', [MissionController::class, 'show']);
        Route::get('/type-base', [BaseController::class, 'index']);
        Route::get('/map', [MapController::class, 'index']);
        Route::get('/joueurs-classement', [UserController::class, 'rankingUser']);
        Route::get('/jeu', function () {
            return view('dashboard.game');
        });
        
        Route::get('/deconnexion', [AuthController::class, 'logoutAdmin']);
        Route::get('/classement', function () {
            return view('dashboard.classement');
        });
        Route::get('/statistique', function () {
            return view('dashboard.statistique');
        });
        // Route::get('/deconnexion', [AuthController::class, 'userLogout'])->name('logoutUser');
    });
});

Route::group(['middleware' => guest::class], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/mentions-legales&GCV', [HomeController::class, 'ViewMentionLegal']);
    Route::get('/connexion', function () {
        return view('authentification.connexion');
    });
    Route::post('/connexion', [AuthController::class, "userLogin"]);
    Route::get('/inscription-complet', function () {
        return view('authentification.successInscription');
    });
    Route::get('/inscription', function () {
        return view('authentification.inscription');
    });
});

Route::get('/user/login', function () {
    return redirect('/dashboard');
});
