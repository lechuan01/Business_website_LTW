<div class="product-container">
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Thêm sản phẩm mới
        </button>
        <br><br>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/productAdd" method="post" enctype="multipart/form-data" id="">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Tên sản phẩm</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Mô tả</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="specs">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Giá</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Số lượng</span>
                                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="qty">
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" aria-label="Default select example" name="category">
                                    <option selected>Phân loại</option>
                                    <option value="keyboard">Keyboard</option>
                                    <option value="mouse">Mouse</option>
                                    <option value="headphone">Headphone</option>
                                    <option value="case">Case</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01">Tải ảnh minh họa</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="thumnail" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01">Ảnh chi tiết cho sản phẩm</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="product_image[]" multiple required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-success" name="submit">Thêm mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover align-middle" id="admin-product-table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 0; foreach ($data["listProduct"] as $item) { $index+=1; ?>
                <tr>
                    <td><?php echo $index ?></td>
                    <td><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["specs"]; ?></td>
                    <td><?php echo $item["category"]; ?></td>
                    <td><?php echo number_format($item["price"], 0, "", ","); ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-id="<?php echo $item["id"]; ?>">Sửa</button>
                        <button type="button" class="btn btn-danger" data-id="<?php echo $item["id"]; ?>">Xóa</button>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>