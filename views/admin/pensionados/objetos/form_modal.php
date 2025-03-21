
<!-- Modal -->

<div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="modalActualizarLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5" id="modalActualizarLabel">Modificar Empleado</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <form method="POST" action="update.php">

                    <input type="hidden" name="empleado_id" id="empleado_id" value="">

                    <div class="mb-3">

                        <label for="primer_nombre" class="form-label">Primer Nombre:</label>

                        <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" required>

                    </div>

                    <div class="mb-3">

                        <label for="segundo_nombre" class="form-label">Segundo Nombre:</label>

                        <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre">

                    </div>

                    <div class="mb-3">

                        <label for="primer_apellido" class="form-label">Primer Apellido:</label>

                        <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" required>

                    </div>

                    <div class="mb-3">

                        <label for="segundo_apellido" class="form-label">Segundo Apellido:</label>

                        <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido">

                    </div>

                    <div class="mb-3">

                        <label for="edad" class="form-label">Edad:</label>

                        <input type="number" class="form-control" name="edad" id="edad" required>

                    </div>

                    <div class="mb-3">

                        <label for="numero_empleado" class="form-label">Número de Empleado:</label>

                        <input type="text" class="form-control" name="numero_empleado" id="numero_empleado" required>

                    </div>

                    <div class="mb-3">

                        <label for="fecha_contratacion" class="form-label">Fecha de Contratación:</label>

                        <input type="date" class="form-control" name="fecha_contratacion" id="fecha_contratacion" required>

                    </div>

                    <div class="mb-3">

                        <label for="salario" class="form-label">Salario:</label>

                        <input type="number" class="form-control" name="salario" id="salario" step="0.01" required>

                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                </form>

            </div>

        </div>

    </div>
    </div>
