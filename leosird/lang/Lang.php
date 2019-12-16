<?php

namespace lang;

class Lang {
    const TABLE_ROW_EMPTY = 'Untuk saat ini tabel masih kosong';
    const TABLE_ROW_UNKNOWN = 'Data tidak diketahui';
    const ERR_CODE_UNKNOWN_DATA = 'unknown_data';
    const ERR_MESSAGE_UNKNOWN_DATA = 'Data tidak diketahui';

    const ERR_CODE_INSERT_TO_DB = 'unable_insert';
    const ERR_MESSAGE_INSERT_TO_DB = 'Terjadi kesalahan pada sistem, gagal menyimpan data';
    const ERR_CODE_UPDATE_TO_DB = 'unable_update';
    const ERR_MESSAGE_UPDATE_TO_DB = 'Terjadi kesalahan pada sistem, gagal memperbarui data';
    const ERR_CODE_DROP_TO_DB = 'unable_drop';
    const ERR_MESSAGE_DROP_TO_DB = 'Terjadi kesalahan pada sistem, gagal menghapus data';

    const ERR_CODE_FILE_NOT_UPLOADED = 'err_upl';
    const ERR_MESSAGE_FILE_NOT_UPLOADED = 'File tidak berhasil diunggah';
    const ERR_CODE_FILE_WRONG_EXT = 'wrong_ext';
    const ERR_MESSAGE_FILE_REQUIRED = 'File harus diisi';
    const ERR_MESSAGE_FILE_WRONG_EXT = 'Format file yang diunggah tidak sesuai';
    const ERR_CODE_COVER_NOT_UPLOADED = 'err_upl_cov';
    const ERR_MESSAGE_COVER_NOT_UPLOADED = 'Cover tidak berhasil diunggah';
    const ERR_CODE_COVER_MAX_SIZE_UPLOADED = 'err_max_size_cov';
    const ERR_MESSAGE_COVER_MAX_SIZE_UPLOADED = 'Cover terlalu besar.';
    const ERR_CODE_COVER_WRONG_EXT = 'wrong_ext_cov';
    const ERR_MESSAGE_COVER_REQUIRED = 'Cover harus diisi';
    const ERR_MESSAGE_COVER_WRONG_EXT = 'Format cover yang diunggah tidak sesuai';
    const ERR_CODE_INPUT_WRONG_YEAR = 'wrong_year';
    const ERR_MESSAGE_INPUT_WRONG_YEAR = 'Tahun tidak sesuai';
    const ERR_CODE_INPUT_KODEBUKU_DUPLICATE = 'codebook_dupl';
    const ERR_MESSAGE_INPUT_KODEBUKU_REQUIRED = 'Kode buku harus diisi dengan benar';
    const ERR_MESSAGE_INPUT_KODEBUKU_DUPLICATE = 'Kode buku sudah terdaftar di sistem';
    const ERR_MESSAGE_INPUT_NPM_REQUIRED = 'NPM harus diisi dengan benar';
    const ERR_MESSAGE_INPUT_NPM_DUPLICATE = 'NPM sudah terdaftar di sistem';
    const ERR_MESSAGE_INPUT_NAMA_LENGKAP_REQUIRED = 'Nama lengkap harus diisi dengan benar';
    const ERR_MESSAGE_INPUT_EMAIL_REQUIRED = 'E-mail harus diisi dengan benar';
    const ERR_MESSAGE_INPUT_NO_HP_REQUIRED = 'Nomor HP harus diisi dengan benar';
    const ERR_MESSAGE_INPUT_ALAMAT_REQUIRED = 'Alamat harus diisi dengan benar';
    const ERR_CODE_INPUT_NAMAKATEGORI_DUPLICATE = 'codebook_dupl';

    const OK_CODE_INSERT_TO_DB = 'ok_insert';
    const OK_MESSAGE_INSERT_TO_DB = 'Berhasil menyimpan data';
    const OK_CODE_UPDATE_TO_DB = 'ok_update';
    const OK_MESSAGE_UPDATE_TO_DB = 'Berhasil memperbarui data';
    const OK_CODE_DROP_TO_DB = 'ok_drop';
    const OK_MESSAGE_DROP_TO_DB = 'Berhasil menghapus data';
}