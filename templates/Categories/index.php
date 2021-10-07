<?php
$this->disableAutoLayout();

echo $this->element('admin/header') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p> <?= $this->Flash->render() ?></p>
                <form action="" method="post">
                    <input type="text" name="key">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <a href="../categories/add"> <button class="btn btn-primary mb-3 float-right">Add</button> </a>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <td>Created</td>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($result)) {
                            if (count($result) > 0) {
                                $i = 1;
                                foreach ($result as $item) { ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item->name ?></td>
                                        <td><?= $item->created ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6"><a href="../categories/edit/<?= $item->id ?>"><i class="fa fa-pen"></i></a></div>
                                                <div class="col-md-6">
                                                    <form method="post" action="/categories/delete/<?= $item->id ?>">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <button type="submit" class="bg-transparent border-0"> <i class="fa fa-trash text-primary"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            <?php }
                            }
                        } else { ?>
                            <?php
                            $i = 1;
                            foreach ($categories as $category) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $category->name ?></td>
                                    <td><?= $category->created ?></td>

                                    <td>
                                        <div class="row">
                                            <div class="col-md-6"><a href="../categories/edit/<?= $category->id ?>"><i class="fa fa-pen"></i></a></div>
                                            <div class="col-md-6">
                                                <form method="post" action="/categories/delete/<?= $category->id ?>" onSubmit="if(!confirm('Bạn có chắc muốn xóa không ?')){return false;}">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="submit" class="bg-transparent border-0"> <i class="fa fa-trash text-primary"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <ul class="pagination float-right">
                    <?= $this->Paginator->prev("Prev") ?>
                    <?= $this->Paginator->next("Next") ?>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php echo $this->element('admin/footer') ?>