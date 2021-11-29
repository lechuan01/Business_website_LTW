<div class="member-container">
    <h2 style="text-align: center;">Tất cả thành viên</h2>
    <div class="container">
        <table class="table table-hover align-middle" id="admin-member-table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tên thành viên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 0;
                foreach ($data["members"] as $mem) {
                    $index += 1; ?>
                    <tr>
                        <td><?php echo $index ?></td>
                        <td><?php echo $mem["id"]; ?></td>
                        <td><?php echo $mem["full_name"]; ?></td>
                        <td><?php echo $mem["phone_number"]; ?></td>
                        <td><?php echo $mem["email"]; ?></td>
                        <td><?php echo $mem["address"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger delete-product" onclick="confirm('Bạn chắc chắn muốn cấm thành viên này?')" data-id="<?php echo $mem["id"]; ?>">Cấm thành viên này</button>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <!-- Modal for update product -->
        <div class="modal fade" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cập nhật sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-edit">
                        <form action="" enctype="multipart/form-data" method="post">
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
                            <div class="input-group d-flex flex-column mb-3">
                                <img style="width: 50%; margin: 0 auto; padding: 10px;" src="" alt="">
                                <input style="width: 100%;" type="file" class="form-control" id="inputGroupFile01" name="thumnail">
                            </div>
                            <div class="input-group mb-3">
                                <img src="" alt="">
                                <label class="input-group-text" for="inputGroupFile01">Ảnh chi tiết cho sản phẩm</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="product_image[]" multiple>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>