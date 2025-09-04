<h1 class="h1">Editar Usuário</h1>
<section class="py-2" id="Formulario">
    <form action="/Usuario/Edit/<?= fldCrip($user[0]['id'], 0); ?>" method="POST" class="form" enctype="multipart/form-data">
        <?= token(); ?>

        <div class="row mt-3">
            <div class="col-6">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user[0]['name']; ?>">
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user[0]['email']; ?>">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-4">
                <label for="status" class="form-label">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="active" <?= $user[0]['status'] == 'active' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="status1">
                        Ativo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="inactive" <?= $user[0]['status'] == 'inactive' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="status2">
                        Inativo
                    </label>
                </div>
            </div>
            <div class="col-4">
                <label for="role" class="form-label">Regra</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="role1" value="admin" <?= $user[0]['role'] == 'admin' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="role1">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="role2" value="user" <?= $user[0]['role'] == 'user' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="role2">
                        Usuário
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-primary">Salvar</button>
    </form>
</section>