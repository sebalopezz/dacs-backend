
    <h1>Crear Historia Clinica</h1>
    <form action="/api/historiasclinicas" method="POST" class="ml-5">
        {{ csrf_field() }}
        <input type="text" name="idpaciente" placeholder="ID Paciente"><br><br>
        <input type="text" name="fechainicio" placeholder="Fecha inicio"><br><br>
        <input type="text" name="gruposanguineo" placeholder="Grupo sanguineo"><br><br>
        <input type="text" name="observaciones" placeholder="Observaciones"><br><br>
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
