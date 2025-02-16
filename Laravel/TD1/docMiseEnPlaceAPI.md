# Création de la classe API

## Controller pour l'API

D'abord, nous créons le fichier du controller qui sera dédié à la gestion de l'API des clients.
```php
php artisan make:controller Api/ClientController
```

Ensuite, nous remplissons ce controller sur la base de celui qui gère les vues, en adaptant les retours faits. Par exemple :  <br>
```path /App/Controllers/ClientController.php ```:
```php
public function index()
{
    $clients = Client::paginate(10);
    return view('clients.index', compact('clients'));
}
```

```path /App/Controllers/Api/ClientController.php ```:
```php
public function index(){
    $clients = Client::all();
    return response()->json($clients);
}
```
Dans ce cas, au lieu de retourner une vue et les données dont elle a besoin, on retourne un json contenant ces données.


## Adaptation des routes

Pour créer les routes dédiées à l'API, nous remplissons le fichier ```path routes/api.php``` de la façon suivante : <br>
```php 
use App\Http\Controllers\Api\ClientController;

// Création des routes pour chaque méthode du controller de l'API
Route::get('/clients',[ClientController::class,'index']);
Route::get('/clients/{id}',[ClientController::class,'show']);
Route::post('/clients/store',[ClientController::class,'store']);
Route::put('/clients/{id}',[ClientController::class,'update']);
Route::delete('/clients/{id}',[ClientController::class,'destroy']);
```

Dans ce fichier, nous créons une route par méthode du controller. Je ne suis pas sûr que les routes vers les méthodes d'ajout, de modification et de suppression soient utiles dans le cadre d'une API mais je les ai laissées au cas où.


## Test via PostMan

### Mise en place

Pour tester via PostMan, j'ai dû télécharger l'application <i>PostMan Agent</i> afin de pouvoir faire des requêtes à mon application Laravel qui tourne sur un serveur local. Ensuite, j'ai créé une collection afin de pouvoir effectuer les requêtes.

### Test


#### Récupération des clients

Dans la collection que j'ai créé, j'ai inséré le lien vers mon api ```(127.0.0.1:8000/api/clients) ```et j'ai constaté que j'ai un résultat qui correspond bien aux données de ma BD : 

```json 
[
  {
    "numeroClient": 1,
    "nom": "Providenci Ankunding",
    "email": "wblock@example.com",
    "carteBancaire": "4716397610570316",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
  },
  {
    "numeroClient": 2,
    "nom": "Ms. Onie Emmerich",
    "email": "walton21@example.org",
    "carteBancaire": "340163153387050",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
  },
  {
    "numeroClient": 3,
    "nom": "Miss Valerie Bednar",
    "email": "mcclure.sid@example.net",
    "carteBancaire": "6011801069677206",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
  },
  {
    "numeroClient": 4,
    "nom": "Tatyana Keebler",
    "email": "russ.kohler@example.com",
    "carteBancaire": "378188572934468",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
  },
  {
    "numeroClient": 5,
    "nom": "Jimmy Marquardt",
    "email": "ledner.garnet@example.net",
    "carteBancaire": "2509118499535781",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
  },
  {
    "numeroClient": 6,
    "nom": "Tamara Lowe Sr.",
    "email": "morissette.jarrell@example.net",
    "carteBancaire": "3528484232639628",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
  },
  {
    "numeroClient": 7,
    "nom": "Boyd Carroll Sr.",
    "email": "zboncak.mallie@example.org",
    "carteBancaire": "3528614960746803",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
  },
  {
    "numeroClient": 8,
    "nom": "Ms. Emma Gutmann Sr.",
    "email": "grayson20@example.com",
    "carteBancaire": "4024007100539153",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
  },
  {
    "numeroClient": 9,
    "nom": "Rodrigo Stiedemann V",
    "email": "ibrahim51@example.com",
    "carteBancaire": "5396664525389585",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
  },
  {
    "numeroClient": 10,
    "nom": "Ms. Bulah Berge",
    "email": "nader.randy@example.com",
    "carteBancaire": "3333333333333333",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:20:57.000000Z"
  }
]
```

#### Récupération d'un seul client

J'ai aussi testé de récupérer les infos d'un client par son id ```(127.0.0.1:8000/api/clients/2)``` :

```json
{
    "numeroClient": 2,
    "nom": "Ms. Onie Emmerich",
    "email": "walton21@example.org",
    "carteBancaire": "340163153387050",
    "created_at": "2025-02-16T15:13:55.000000Z",
    "updated_at": "2025-02-16T15:13:55.000000Z"
}
```



#### Suppression d'un client
POur tester cette méthode, on accède par exemple à ```http://127.0.0.1:8000/api/clients/10```. Si le client existe et est correctement supprimé, on aura : 
```json
{
    "message": "Client supprimé !"
}
```

Sinon nous aurons : 
```json 
{
    "message": "Non trouvé !"
}
```

Et si on refait une requête de récupération de tous les clients à l'API, ou même si on demande juste celui qu'on a supprimé, il n'apparaîtra plus.