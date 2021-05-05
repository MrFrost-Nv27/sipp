 <div class="wrap-input100 validate-input">
     <span class="label-input100">Jurusan</span>
     <select class="select-text" name="jurusan" id="edit-jurusan">
         <option value="" class="" disabled selected>--- Pilih Jurusan ---</option>
         <?php foreach ($jurusan as $jrsn) : ?>
         <option value="<?= $jrsn['id']; ?>" data-lembaga="<?= $jrsn['id_lembaga']; ?>">
             <?= $jrsn['jurusan']; ?></option>
         <?php endforeach; ?>
     </select>
     <span class="focus-select" data-symbol="engineering"></span>
 </div>
