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

`````
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

## Feature: Gestion de Postulaciones de Becas
[Archivo JSON](./tests/ApiTest/GestionDePostulacion.json)
En esta sección se detallan los escenarios de prueba para el servicio de Postulacione de becas, diseñados para validar el sistema de postulacion a Becas 
### Background
-**Dado el sistema de gestion de Postulacion**
-**y que los endpoints esten disponibles**
<details open>
  <summary><b><i>Escenario 1:</i></b> creación de postulación con POST</summary>

  ```gherkin
  Scenario: creación de postulación con POST 
    Given Se establece el endpoint de la API para crear postulaciones con POST
    When Se establece el parámetro HEADER con el tipo de contenido como "application/json"
    And se establece el cuerpo de la solicitud con los datos de la postulación
    Then Se recibe un código de respuesta HTTP válido 201
    And El cuerpo de la respuesta "POST" no está vacío
```
</details>

<details open>
  <summary><b><i>Escenario 2:</i></b> obtención de postulaciones con GET </summary>

  ```gherkin
  Scenario: obtención de postulaciones con GET
    Given Se establece el endpoint de la API para obtener postulaciones con GET
    When Se establece el parámetro HEADER con el tipo de contenido como "application/json"
    And Se envía la solicitud HTTP GET
    Then Se recibe un código de respuesta HTTP válido 200 para "GET"
    And El cuerpo de la respuesta "GET" no está vacío
```
</details>

## Feature: Reportes de Solicitudes de Becas
[Archivo JSON](./tests/ApiTest/ReportesDeSolicitudesDeBecas.json)
### Background

- **Dado que el sistema está operativo**
- **Y que los endpoints de becas están disponibles**

<details open>
  <summary><b><i>Escenario 1:</i></b> Crear solicitud de beca.</summary>

  ```gherkin
  Scenario: Crear solicitud de beca
    Given El usuario tiene acceso al endpoint para crear solicitudes de beca.
    When El usuario envía una solicitud de beca con el HEADER "Content-Type" como "application/json"
    And Incluye la documentación requerida en el cuerpo de la solicitud
    And envía una petición HTTP POST.
    Then El sistema recibe un código de respuesta HTTP 201
    And El cuerpo de la respuesta contiene un identificador de la solicitud no vacío.
```
</details>

<details open>
  <summary><b><i>Escenario 2:</i></b>  Consultar solicitud de beca</summary>

 ```gherkin
  Scenario: Consultar solicitud de beca
    Given El usuario tiene acceso al endpoint para consultar solicitudes de beca.
    When El usuario consulta una solicitud de beca específica con el HEADER "Content-Type" como "application/json"
    And Envía una petición HTTP GET.
    Then El sistema recibe un código de respuesta HTTP 200
    And El cuerpo de la respuesta contiene los detalles de la solicitud no vacíos.
```
</details>

<details open>
  <summary><b><i>Escenario 3:</i></b> Actualizar solicitud de beca</summary>

 ```gherkin
  Scenario: Actualizar solicitud de beca
    Given El usuario tiene acceso al endpoint para actualizar solicitudes de beca.
    When El usuario envía una actualización de la solicitud de beca con el HEADER "Content-Type" como "application/json"
    And Incluye la información actualizada en el cuerpo de la solicitud
    And Envía una petición HTTP PUT.
    Then El sistema recibe un código de respuesta HTTP 200
    And El cuerpo de la respuesta contiene los detalles actualizados de la solicitud no vacíos.
```
</details>

<details open>
  <summary><b><i>Escenario 4:</i></b> Eliminar solicitud de beca</summary>

 ```gherkin
  Scenario: Eliminar solicitud de beca
    Given El usuario tiene acceso al endpoint para eliminar solicitudes de beca.
    When El usuario envía una solicitud para eliminar una solicitud de beca específica
    And Envía una petición HTTP DELETE.
    Then El sistema recibe un código de respuesta HTTP 200.
```
</details>


## Feature:  Búsqueda y Seguimiento de Becas

[Archivo JSON](./tests/ApiTest/BusquedaySeguimientoDeBecas.json)

En esta sección se detallan los escenarios de prueba para el servicio de búsqueda y seguimiento de becas, diseñados para validar el comportamiento del sistema en relación con la obtención de información y seguimiento de las solicitudes de becas.

### Background: Usuario Autenticado

<details open>
  <summary><b><i>Escenario 1:</i></b> Obtener información de la beca</summary>

  ```gherkin
  Scenario: Obtener información de la beca
    Given Que se establece el endpoint de beca GET para "<id_beca>"
    When Se establece el parámetro HEADER del tipo de contenido de la solicitud como "application/json"
    And Se envía la solicitud HTTP GET
    Then Se recibe un código de respuesta HTTP válido 200 para "GET"
    And El cuerpo de la respuesta "información de beca" no está vacío
  ```
</details>

### Background: Usuario autenticado con solicitud de beca en revisión

<details open>
  <summary><b><i>Escenario 2:</i></b> Obtener seguimiento de la solicitud de beca</summary>

  ```gherkin
    Scenario: Obtener seguimiento de la solicitud de beca
      Given Que se establece el endpoint de seguimiento de solicitud de beca GET para "<id_solicitud>"
      When Se establece el parámetro HEADER del tipo de contenido de la solicitud como "application/json"
      And Se envía la solicitud HTTP GET
      Then Se recibe un código de respuesta HTTP válido 200 para "GET"
      And El cuerpo de la respuesta "seguimiento de solicitud de beca" no está vacío
  ```
</details>

## Feature: Notificaciones sobre las Becas

[Archivo JSON](./tests/ApiTest/NotificacionBecas.json)

En esta sección se detallan los escenarios de prueba para el servicio de notificaciones sobre las becas, diseñados para validar el comportamiento del sistema en relación con la configuración y envío de notificaciones relacionadas con las becas.

### Background: Usuario Autenticado

<details open>
  <summary><b><i>Escenario 1:</i></b> Configurar notificaciones personalizadas para estudiantes</summary>

  ```gherkin
  Scenario: Configurar notificaciones personalizadas para estudiantes
    Given Que se establece el endpoint de configuración de notificaciones POST para estudiantes
    When Se establece el parámetro HEADER del tipo de contenido de la solicitud como "application/json"
    And Se envía el cuerpo de la solicitud con las preferencias de notificación
    And Se envía la solicitud HTTP POST
    Then Se recibe un código de respuesta HTTP válido 201
    And El cuerpo de la respuesta "configuración de notificaciones creada" no está vacío
  ```
</details>

<details open>

  <summary><b><i>Escenario 2:</i></b> Obtener configuración de notificaciones de estudiantes</summary>

  ```gherkin
      Scenario: Obtener configuración de notificaciones de estudiantes
      Given Que se establece el endpoint de configuración de notificaciones GET para estudiantes
      When Se establece el parámetro HEADER del tipo de contenido de la solicitud como "application/json"
      And Se envía la solicitud HTTP GET
      Then Se recibe un código de respuesta HTTP válido 200
      And El cuerpo de la respuesta "configuración de notificaciones de estudiantes" no está vacío
  ```
</details>

<details open>
  <summary><b><i>Escenario 3:</i></b> Enviar notificación sobre el estado de la solicitud de beca</summary>

  ```gherkin
      Scenario: Enviar notificación sobre el estado de la solicitud de beca
      Given Que se establece el endpoint de envío de notificaciones POST para estado de solicitudes
      When Se establece el parámetro HEADER del tipo de contenido de la solicitud como "application/json"
      And Se envía el cuerpo de la solicitud con la información del estado de la solicitud
      And Se envía la solicitud HTTP POST
      Then Se recibe un código de respuesta HTTP válido 201
      And El cuerpo de la respuesta "notificación enviada" no está vacío
  ```
</details>

<details open>
  <summary><b><i>Escenario 4:</i></b> Enviar recordatorio sobre eventos importantes y plazos a estudiantes</summary>

  ```gherkin
      Scenario: Enviar recordatorio sobre eventos importantes y plazos a estudiantes
      Given Que se establece el endpoint de envío de notificaciones POST para recordatorios
      When Se establece el parámetro HEADER del tipo de contenido de la solicitud como "application/json"
      And Se envía el cuerpo de la solicitud con la información del evento o plazo
      And Se envía la solicitud HTTP POST
      Then Se recibe un código de respuesta HTTP válido 201
      And El cuerpo de la respuesta "recordatorio enviado" no está vacío
  ```

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
`````
