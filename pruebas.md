## Feature: Gestión de Usuarios

[Archivo JSON](./tests/ApiTest/GestionDeUsuarios.json)

En esta sección se detallan los escenarios de prueba para el servicio de gestión de usuarios, diseñados para validar el correcto funcionamiento de las diferentes operaciones del API.

### Background

- **Dado que el sistema está operativo**
- **Y que la base de datos está inicializada**

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

- **Dado que un usuario está autenticado**
- **Y que los endpoints de la API están disponibles**

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
```
</details>




## Feature: Gestión de Evaluaciones y Asignación de Postulantes
[Archivo JSON](./tests/ApiTest/GestiónDeEvaluacionesyAsignaciónDePostulantes.json.json)
### Background

- **Dado que el sistema de gestión de evaluaciones funcione**
- **Y que los endpoints de la API están disponibles**

<details open>
  <summary><b><i>Escenario 1:</i></b> Evaluación de Solicitudes de Becas.</summary>
  
  ```gherkin
  Scenario: Evaluación de Solicitudes de Becas
    Given El sistema recibe solicitudes de becas de estudiantes.
    When permite una revisión exhaustiva y personalizada de las solicitudes mediante una solicitud GET a /evaluaciones/solicitudes.
    And se envía una solicitud POST HTTP con datos del estudiante
    Then se recibe un código de respuesta HTTP 201 válido
    And el cuerpo de la respuesta contiene los datos de las solicitudes.
```
</details>
<details open>
  <summary><b><i>Escenario 2:</i></b>  Asignación de Becas</summary>
  
  ```gherkin
  Scenario:  Asignación de Becas
    Given  El sistema ha clasificado las solicitudes.
    When Identifica a los estudiantes más calificados para recibir las becas mediante una solicitud POST a /evaluaciones con los datos de los candidatos.
    And se envía una solicitud POST HTTP con datos del estudiante
    Then se recibe un código de respuesta HTTP 201 válido
    And el cuerpo de la respuesta indicando la asignación exitosa.
```
</details>
