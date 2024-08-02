## Feature: Gestión de Usuarios

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
