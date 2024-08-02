## Feature: Gestión de Usuarios

[Archivo JSON](./tests/ApiTest/GestionDeUsuarios.json)

En esta sección se detallan los escenarios de prueba para el servicio de gestión de usuarios, diseñados para validar el correcto funcionamiento de las diferentes operaciones del API.

### Background

-   **Dado que el sistema está operativo**
-   **Y que la base de datos está inicializada**

<details open>
  <summary><b><i>Escenario 1:</i></b> Registro de usuario.</summary>
  
  ```gherkin
  Scenario: Registro de usuario
    Given que se establece el endpoint POST /api/users/students
    When se configura el HEADER con content type "application/json"
    And se envía una solicitud POST HTTP con datos del estudiante
    Then se recibe un código de respuesta HTTP 201 válido
    And el cuerpo de la respuesta contiene los datos del estudiante creado
```
</details>

### Background

-   **Dado que un usuario está autenticado**
-   **Y que los endpoints de la API están disponibles**

<details open>
  <summary><b><i>Escenario 2:</i></b> Recuperación de contraseñas.</summary>

```gherkin

Scenario: Recuperación de contraseñas
  Given que se establece el endpoint POST /api/users/recover-password
  When se configura el HEADER con content type "application/json"
  And se envía una solicitud POST HTTP con el correo del usuario
  Then se recibe un código de respuesta HTTP 200 válido
  And el cuerpo de la respuesta contiene un enlace de recuperación de contraseña
```

</details>
<details open>
  <summary><b><i>Escenario 3:</i></b> Actualización de información de usuario.</summary>

```gherkin

Scenario: Actualización de información de usuario
  Given que se establece el endpoint PUT /api/users/{userId}
  When se configura el HEADER con content type "application/json"
  And se envía una solicitud PUT HTTP con los datos actualizados del usuario
  Then se recibe un código de respuesta HTTP 200 válido
  And el cuerpo de la respuesta contiene los datos del usuario actualizados
```

</details>
<details open>
  <summary><b><i>Escenario 4:</i></b> Eliminación de cuentas.</summary>
  
```gherkin

Scenario: Eliminación de cuentas
Given que se establece el endpoint DELETE /api/users/{userId}
When se envía una solicitud DELETE HTTP
Then se recibe un código de respuesta HTTP 200 válido
And el cuerpo de la respuesta confirma la eliminación del usuario

````
</details>


## Feature: Gestión de Beneficiarios
[Archivo JSON](./tests/ApiTest/GestiondeBeneficiarios.json)

### Background

- **Dado que se validó la solicitud de un postulande**
- **El usuario es un Admin**
- **Y que los endpoints de la API están disponibles**
<details open>
  <summary><b><i>Escenario 1:</i></b> Registro de beneficiario.</summary>

  ```gherkin
  Scenario: Registro de beneficiario
    Given que se establece el endpoint POST /api/users/{userId}/beneficiary/{convocatoriaId}
    When se configura el HEADER con content type "application/json"
    And se envía una solicitud POST HTTP con los datos del estudiante en el cuerpo de la solicitud
    And se envían los datos de la convocatoria en el cuerpo de la solicitud
    Then se recibe un código de respuesta HTTP 201 válido
    And el cuerpo de la respuesta contiene los datos del estudiante actualizados con la convocatoria en la que fue aceptado
````

</details>

### Background

-   **Dado que un usuario está autenticado**
-   **Y que el usuario es un admin**
-   **Y que los endpoints de la API están disponibles**

<details open>
  <summary><b><i>Escenario 2:</i></b> Remover beca del beneficiario.</summary>

```gherkin

Scenario: Eliminación de beneficiario
  Given que se establece el endpoint DELETE /api/users/{userId}/beneficiary/
  When se configura el HEADER con content type "application/json"
  And se envía una solicitud DELETE HTTP con el id del usuario
  Then se recibe un código de respuesta HTTP 200 válido
  And el cuerpo de la respuesta confirma que se le removió la beca al usuario y los  datos actualizados del usuario
```

</details>

### Background

-   **Dado que un usuario está autenticado**
-   **Y que el usuario es un admin**
-   **Y que los endpoints de la API están disponibles**
<details open>
  <summary><b><i>Escenario 3:</i></b> Actualizar beca del beneficiario.</summary>

```gherkin

Scenario: Actualización de información de la beca del beneficiario
  Given que se establece el endpoint PUT /api/users/{userId}/beneficiary/{becaId}
  When se configura el HEADER con content type "application/json"
  And se envía una solicitud PUT HTTP con el id de la nueva beca para el beneficiario
  Then se recibe un código de respuesta HTTP 200 válido
  And el cuerpo de la respuesta contiene los datos del usuario actualizados
```

</details>
### Background

-   **Dado que un usuario está autenticado**
-   **Y que el usuario es un admin**
-   **Y que los endpoints de la API están disponibles**
<details open>
  <summary><b><i>Escenario 4:</i></b> Mostrar si un usuario es beneficiario.</summary>


```gherkin

Scenario: Mostrar si un usuario es beneficiario
  Given que se establece el endpoint GET /api/users/{userId}/beneficiary
  When se envía una solicitud GET HTTP
  Then se recibe un código de respuesta HTTP 200 válido
  And el cuerpo de la respuesta la información del usuario y la beca que posee
```

</details>
