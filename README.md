# Replicando o projeto
- 1 - Criando um projeto Laravel:

	`composer create-project --prefer-dist laravel/laravel InfyOm`

- 2 - Configure o .env, adicionando o banco de dados e caso seja necessário. Gere a chave de segurança do projeto com o comando:

	`php artisan key:generate`

- 3 - Adiciona essas dependências no conjunto "require" dentro do compose.json
```php
		"require": {
			"infyomlabs/laravel-generator": "7.0.x-dev",
			"laravelcollective/html": "^6.1",
			"infyomlabs/adminlte-templates": "7.0.x-dev"
		}
```
- 5 - Execute o comando: `composer update`

- 6 - Adiciona as linhas abaixo em "config/app.php":

```php
		'Form'      => Collective\Html\FormFacade::class,
		'Html'      => Collective\Html\HtmlFacade::class,
		'Flash'     => Laracasts\Flash\Flash::class,
```

- 7 - Execute o comando: `php artisan vendor:publish`

	-- Escolha 0 para publicar todos

- 8 - Execute o comando: `php artisan infyom:publish`

	--  Caso deseje, adicione novos campos a migration de User, por exemplo:  CPF, perfil, peso, [...]

	-- Todos os campos adicionados na migration devem ser adicionados também na respectiva model dentro do array $fillable.

- 9 - Execute os comandos:

	`composer require laravel/ui`
	
	`php artisan ui bootstrap --auth`

- 10 - Execute o comando: `php artisan infyom.publish:layout`

- 11 - Execute o comando: `php artisan migrate`

- 12 - Execute o comando: `php artisan serve`

	-- Vá até http://localhost:8000/register

## Adicionando um novo CRUD

- 1 - Cria o Json Schema em: 

	https://harish81.github.io/infyom-schema-generator/
	
- 2 - Adicione o Json Schema em: "resources/model_schemas/"

	-- É preciso cria o diretório "model_schemas" caso não exista.

- 3 - Execute o comando: 

`php artisan infyom:scaffold $MODEL --fieldsFile=$SCHEMA_FILE.json`

-- $MODEL é o nome da Model que será criada

-- $SCHEMA_FILE.json é o arquivo .json adicionado em "model_schemas"
