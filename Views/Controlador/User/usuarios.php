<p class="h1">Usuários</p>
<p class="h3">Use o formuláio abaixo para cadastrar um novo usuário</p>

<section class="py-2" id="Formulario">
    <form action="/Usuario/create" method="POST" class="" enctype="multipart/form-data">
        <?= token(); ?>

        <div class="row mt-3">
            <div class="col-6">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-4">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-4">
                <label for="status" class="form-label">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="active" checked>
                    <label class="form-check-label" for="status1">
                        Ativo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="inactive">
                    <label class="form-check-label" for="status2">
                        Inativo
                    </label>
                </div>
            </div>
            <div class="col-4">
                <label for="role" class="form-label">Regra</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="role1" value="admin" checked>
                    <label class="form-check-label" for="role1">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="role2" value="user">
                    <label class="form-check-label" for="role2">
                        Usuário
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-primary">Salvar</button>
    </form>
</section>

<section id="Tabela" class="pt-5">
    <table class="table table-light table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Regra</th>
                <th>Data Criado</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td class="<?= $user['status'] == 'active' ? 'text-success' : 'text-danger'; ?>"><?= $user['status']; ?></td>
                    <td><?= $user['role']; ?></td>
                    <td><?= $user['created_at']; ?></td>
                    <td>
                        <div class="btn-group">
                            <form class="form-excluir" action="/Usuario/Delete/<?= fldCrip($user['id'], 0); ?>" method="POST">
                                <?= token(); ?>
                                <button type="submit" class="btn btn-link btn-sm">Excluir</button>
                            </form>
                            <a href="/Controle/Usuario/Edit/<?= fldCrip($user['id'], 0); ?>" class="btn btn-link btn-sm">Editar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.form-excluir').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Confirmar exclusão',
                    text: "Tem certeza que deseja excluir este usuário?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Remove o event listener temporariamente para evitar loop
                        form.removeEventListener('submit', arguments.callee);
                        form.submit();
                    }
                });
            });
        });
    });
</script>