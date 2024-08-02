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

Aquí tienes los escenarios de prueba para el feature de gestión de usuarios, estructurados en formato Gherkin, con un enfoque similar al que proporcionaste:

## Feature: Seguridad

[Archivo JSON](./tests/ApiTest/Seguridad.json)

En esta sección se detallan los escenarios de prueba para el servicio de seguridad, diseñados para validar el comportamiento del sistema en situaciones relacionadas con autenticación y autorización.

### Background

- **Dado que el sistema está operativo**
- **Y que los endpoints de autenticación y autorización están disponibles**

<details open>
  <summary><b><i>Escenario 1:</i></b> Acceso a página protegida sin autenticación.</summary>

  ```gherkin
  Scenario: Acceso a página protegida sin autenticación
    Given El usuario no está autenticado
    When Intenta acceder a la página de solicitud de becas mediante una solicitud GET a /solicitud-becas
    Then Es redirigido a la página de inicio de sesión con una respuesta 302 (Found)
  ```
</details>

<details open>
  <summary><b><i>Escenario 2:</i></b> Iniciar sesión incorrecto.</summary>

  ```gherkin
  Scenario: Iniciar sesión incorrecto
    Given El usuario ingresa un nombre de usuario y contraseña incorrectos
    When Intenta iniciar sesión con credenciales incorrectas mediante una solicitud POST a /login con su nombre de usuario y contraseña
    Then Recibe una respuesta 401 (Unauthorized) indicando que las credenciales son incorrectas
  ```
</details>

<details open>
  <summary><b><i>Escenario 3:</i></b> Iniciar sesión correcto.</summary>

  ```gherkin
  Scenario: Iniciar sesión correcto
    Given El usuario ingresa un nombre de usuario y contraseña correctos
    When Intenta iniciar sesión con credenciales correctas mediante una solicitud POST a /login con su nombre de usuario y contraseña
    Then Recibe una respuesta 200 (OK) con un token de autenticación y es redirigido a la página principal
  ```
</details>

<details open>
  <summary><b><i>Escenario 4:</i></b> Acceso a página protegida con autenticación.</summary>

  ```gherkin
  Scenario: Acceso a página protegida con autenticación
    Given El usuario está autenticado
    When Accede a la página de solicitud de becas mediante una solicitud GET a /solicitud-becas
    Then Recibe una respuesta 200 (OK) y puede ver y completar el formulario de solicitud de becas
  ```
</details>

<details open>
  <summary><b><i>Escenario 5:</i></b> Cambio de contraseña.</summary>

  ```gherkin
  Scenario: Cambio de contraseña
    Given El usuario está autenticado
    When Intenta cambiar su contraseña mediante una solicitud PUT a /usuarios/{id}/cambiar-contraseña con la contraseña actual y la nueva contraseña
    Then La contraseña es actualizada correctamente, recibiendo una respuesta 200 (OK), y el usuario es notificado
  ```
</details>

<details open>
  <summary><b><i>Escenario 6:</i></b> Acceso a sección sin permisos suficientes.</summary>

  ```gherkin
  Scenario: Acceso a sección sin permisos suficientes
    Given El usuario está autenticado
    When Intenta acceder a una sección para la cual no tiene permisos mediante una solicitud GET a /seccion-restringida
    Then Recibe una respuesta 403 (Forbidden) con un mensaje de error indicando que no tiene permisos suficientes
  ```
</details>

<details open>
  <summary><b><i>Escenario 7:</i></b> Bloqueo de cuenta tras varios intentos fallidos.</summary>

  ```gherkin
  Scenario: Bloqueo de cuenta tras varios intentos fallidos
    Given El usuario está autenticado y ha realizado varios intentos de acceso fallidos
    When Intenta iniciar sesión nuevamente mediante una solicitud POST a /login
    Then Recibe una respuesta 423 (Locked) indicando que su cuenta ha sido bloqueada temporalmente
  ```
</details>

---


Aquí está el formato para el feature de gestión de becas:

---

## Feature: Gestión de Becas

[Archivo JSON](./tests/ApiTest/GestionDeBecas.json)

En esta sección se detallan los escenarios de prueba para el servicio de gestión de becas, diseñados para validar el comportamiento del sistema en relación con la solicitud y administración de becas.

### Background

- **Dado que el sistema está operativo**
- **Y que los endpoints de becas están disponibles**

<details open>
  <summary><b><i>Escenario 1:</i></b> Acceso a página de solicitud de becas sin autenticación.</summary>

  ```gherkin
  Scenario: Acceso a página de solicitud de becas sin autenticación
    Given El usuario no está autenticado
    When Intenta acceder a la página de solicitud de becas mediante una solicitud GET a /solicitud-becas
    Then Es redirigido a la página de inicio de sesión con una respuesta 302 (Found)
  ```
</details>

<details open>
  <summary><b><i>Escenario 2:</i></b> Acceso a página de solicitud de becas con autenticación.</summary>

  ```gherkin
  Scenario: Acceso a página de solicitud de becas con autenticación
    Given El usuario está autenticado
    When Accede a la página de solicitud de becas mediante una solicitud GET a /solicitud-becas
    Then Recibe una respuesta 200 (OK) y puede ver y completar el formulario de solicitud de becas
  ```
</details>

<details open>
  <summary><b><i>Escenario 3:</i></b> Envío de solicitud de beca.</summary>

  ```gherkin
  Scenario: Envío de solicitud de beca
    Given El usuario está autenticado
    When Completa y envía el formulario de solicitud de becas mediante una solicitud POST a /solicitud-becas con los datos de la beca
    Then Recibe una respuesta 201 (Created) confirmando que la solicitud ha sido recibida
  ```
</details>

<details open>
  <summary><b><i>Escenario 4:</i></b> Revisión del estado de la solicitud de beca.</summary>

  ```gherkin
  Scenario: Revisión del estado de la solicitud de beca
    Given El usuario está autenticado
    When Accede a la sección de estado de solicitudes de becas mediante una solicitud GET a /estado-solicitudes
    Then Recibe una respuesta 200 (OK) y puede ver el estado actual de su solicitud de beca
  ```
</details>

<details open>
  <summary><b><i>Escenario 5:</i></b> Acceso al panel de administración de becas.</summary>

  ```gherkin
  Scenario: Acceso al panel de administración de becas
    Given El administrador está autenticado
    When Accede al panel de administración de becas mediante una solicitud GET a /admin/becas
    Then Recibe una respuesta 200 (OK) y puede ver y gestionar todas las solicitudes de becas
  ```
</details>

<details open>
  <summary><b><i>Escenario 6:</i></b> Aprobación de una solicitud de beca.</summary>

  ```gherkin
  Scenario: Aprobación de una solicitud de beca
    Given El administrador está autenticado
    When Revisa una solicitud de beca y la aprueba mediante una solicitud PUT a /admin/becas/{id}/aprobar
    Then Recibe una respuesta 200 (OK) y el usuario solicitante recibe una notificación de aprobación de su beca
  ```
</details>

<details open>
  <summary><b><i>Escenario 7:</i></b> Rechazo de una solicitud de beca.</summary>

  ```gherkin
  Scenario: Rechazo de una solicitud de beca
    Given El administrador está autenticado
    When Revisa una solicitud de beca y la rechaza mediante una solicitud PUT a /admin/becas/{id}/rechazar
    Then Recibe una respuesta 200 (OK) y el usuario solicitante recibe una notificación de rechazo de su beca
  ```
</details>

<details open>
  <summary><b><i>Escenario 8:</i></b> Actualización de información de la solicitud de beca.</summary>

  ```gherkin
  Scenario: Actualización de información de la solicitud de beca
    Given El usuario está autenticado y su solicitud está en revisión
    When Accede a la página de solicitud de becas y actualiza su información mediante una solicitud PUT a /solicitud-becas/{id} con los nuevos datos
    Then Recibe una respuesta 200 (OK) confirmando que su información ha sido actualizada correctamente
  ```
</details>

<details open>
  <summary><b><i>Escenario 9:</i></b> Cancelación de la solicitud de beca.</summary>

  ```gherkin
  Scenario: Cancelación de la solicitud de beca
    Given El usuario está autenticado y su solicitud está en revisión
    When Decide cancelar su solicitud de beca mediante una solicitud DELETE a /solicitud-becas/{id}
    Then Recibe una respuesta 200 (OK) confirmando que la solicitud ha sido cancelada
  ```
</details>

<details open>
  <summary><b><i>Escenario 10:</i></b> Ver detalles de la beca aprobada.</summary>

  ```gherkin
  Scenario: Ver detalles de la beca aprobada
    Given El usuario está autenticado y su beca ha sido aprobada
    When Accede a la sección de becas aprobadas mediante una solicitud GET a /becas-aprobadas
    Then Recibe una respuesta 200 (OK) y puede ver los detalles de su beca aprobada
  ```
</details>

---


Aquí está el formato para el feature de Gestión de Evaluaciones y Asignación de Postulantes >

---



## Feature: Gestión de Evaluaciones y Asignación de Postulantes
[Archivo JSON](./tests/ApiTest/GestiónDeEvaluacionesyAsignaciónDePostulantes.json)
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