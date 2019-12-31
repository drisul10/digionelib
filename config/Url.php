<?php

namespace config;

class Url {

    const BASE = 'http://localhost/';
    const LEOSIRD = self::BASE;

    // url param controller name
    const CNAME_BACK_DIGILIB = 'back_digilib';
    const CNAME_BOOK_CATEGORY = 'back_book_category';
    const CNAME_BACK_ANGGOTA = 'back_anggota';
    const CNAME_BACK_LAPORAN_PEMINJAMAN = 'back_laporan_peminjaman';
    const CNAME_BACK_LAPORAN_PENGEMBALIAN = 'back_laporan_pengembalian';
    const CNAME_FRONT_DIGILIB = 'digilib';

    // url param route name
    const RNAME_INDEX = 'index';
    const RNAME_CREATE = 'create';
    const RNAME_CREATE_ACTION = 'create_action';
    const RNAME_DETAIL = 'detail';
    const RNAME_UPDATE = 'update';
    const RNAME_UPDATE_ACTION = 'update_action';
    const RNAME_DELETE = 'delete';
    const RNAME_READ_PDF = 'read_pdf';
    const RNAME_DAILY = 'daily';
    const RNAME_WEEKLY = 'weekly';
    const RNAME_MONTHLY = 'monthly';
    const RNAME_YEARLY = 'yearly';
    const RNAME_CATEGORY = 'category';
    const RNAME_SEARCH = 'search';

    // module back digilib
    const BASE_BACK_DIGILIB = self::LEOSIRD . '/p?c=' . self::CNAME_BACK_DIGILIB;
    const BACK_DIGILIB_INDEX = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_INDEX;
    const BACK_DIGILIB_DETAIL = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_DETAIL;
    const BACK_DIGILIB_CREATE = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_CREATE;
    const BACK_DIGILIB_CREATE_ACTION = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_CREATE_ACTION;
    const BACK_DIGILIB_UPDATE = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_UPDATE;
    const BACK_DIGILIB_UPDATE_ACTION = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_UPDATE_ACTION;
    const BACK_DIGILIB_DELETE = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_DELETE;
    const BACK_DIGILIB_READ_PDF = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_READ_PDF;
    
    // module back book category
    const BASE_BACK_BOOK_CATEGORY = self::LEOSIRD . '/p?c=' . self::CNAME_BOOK_CATEGORY;
    const BACK_BOOK_CATEGORY_INDEX = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_INDEX;
    const BACK_BOOK_CATEGORY_DETAIL = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_DETAIL;
    const BACK_BOOK_CATEGORY_CREATE = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_CREATE;
    const BACK_BOOK_CATEGORY_CREATE_ACTION = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_CREATE_ACTION;
    const BACK_BOOK_CATEGORY_UPDATE = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_UPDATE;
    const BACK_BOOK_CATEGORY_UPDATE_ACTION = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_UPDATE_ACTION;
    const BACK_BOOK_CATEGORY_DELETE = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_DELETE;

    // module back anggota
    const BASE_BACK_ANGGOTA = self::LEOSIRD . '/p?c=' . self::CNAME_BACK_ANGGOTA;
    const BACK_ANGGOTA_INDEX = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_INDEX;
    const BACK_ANGGOTA_DETAIL = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_DETAIL;
    const BACK_ANGGOTA_CREATE = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_CREATE;
    const BACK_ANGGOTA_CREATE_ACTION = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_CREATE_ACTION;
    const BACK_ANGGOTA_UPDATE = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_UPDATE;
    const BACK_ANGGOTA_UPDATE_ACTION = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_UPDATE_ACTION;
    const BACK_ANGGOTA_DELETE = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_DELETE;

    // module back laporan peminjaman
    const BASE_BACK_LAPORAN_PEMINJAMAN = self::LEOSIRD . '/p?c=' . self::CNAME_BACK_LAPORAN_PEMINJAMAN;
    const BACK_LAPORAN_PEMINJAMAN_INDEX = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_INDEX;
    const BACK_LAPORAN_PEMINJAMAN_DETAIL = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_DETAIL;
    const BACK_LAPORAN_PEMINJAMAN_CREATE = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_CREATE;
    const BACK_LAPORAN_PEMINJAMAN_CREATE_ACTION = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_CREATE_ACTION;
    const BACK_LAPORAN_PEMINJAMAN_UPDATE = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_UPDATE;
    const BACK_LAPORAN_PEMINJAMAN_UPDATE_ACTION = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_UPDATE_ACTION;
    const BACK_LAPORAN_PEMINJAMAN_DELETE = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_DELETE;
    const BACK_LAPORAN_PEMINJAMAN_DAILY = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_DAILY;
    const BACK_LAPORAN_PEMINJAMAN_WEEKLY = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_WEEKLY;
    const BACK_LAPORAN_PEMINJAMAN_MONTHLY = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_MONTHLY;
    const BACK_LAPORAN_PEMINJAMAN_YEARLY = self::BASE_BACK_LAPORAN_PEMINJAMAN . '&r=' . self::RNAME_YEARLY;

    // module back laporan pengembalian
    const BASE_BACK_LAPORAN_PENGEMBALIAN = self::LEOSIRD . '/p?c=' . self::CNAME_BACK_LAPORAN_PENGEMBALIAN;
    const BACK_LAPORAN_PENGEMBALIAN_INDEX = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_INDEX;
    const BACK_LAPORAN_PENGEMBALIAN_DETAIL = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_DETAIL;
    const BACK_LAPORAN_PENGEMBALIAN_CREATE = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_CREATE;
    const BACK_LAPORAN_PENGEMBALIAN_CREATE_ACTION = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_CREATE_ACTION;
    const BACK_LAPORAN_PENGEMBALIAN_UPDATE = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_UPDATE;
    const BACK_LAPORAN_PENGEMBALIAN_UPDATE_ACTION = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_UPDATE_ACTION;
    const BACK_LAPORAN_PENGEMBALIAN_DELETE = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_DELETE;
    const BACK_LAPORAN_PENGEMBALIAN_DAILY = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_DAILY;
    const BACK_LAPORAN_PENGEMBALIAN_WEEKLY = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_WEEKLY;
    const BACK_LAPORAN_PENGEMBALIAN_MONTHLY = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_MONTHLY;
    const BACK_LAPORAN_PENGEMBALIAN_YEARLY = self::BASE_BACK_LAPORAN_PENGEMBALIAN . '&r=' . self::RNAME_YEARLY;

    // module front digilib
    const BASE_FRONT_DIGILIB = self::LEOSIRD . '/p?c=' . self::CNAME_FRONT_DIGILIB;
    const FRONT_DIGILIB_INDEX = self::BASE_FRONT_DIGILIB . '&r=' . self::RNAME_INDEX;
    const FRONT_DIGILIB_CATEGORY = self::BASE_FRONT_DIGILIB . '&r=' . self::RNAME_CATEGORY;
    const FRONT_DIGILIB_DETAIL = self::BASE_FRONT_DIGILIB . '&r=' . self::RNAME_DETAIL;
    const FRONT_DIGILIB_READ_PDF = self::BASE_FRONT_DIGILIB . '&r=' . self::RNAME_READ_PDF;
    const FRONT_DIGILIB_SEARCH = self::BASE_FRONT_DIGILIB . '&r=' . self::RNAME_SEARCH;

    // path files
    const PATH_DIGILIB_FILE = self::LEOSIRD . '/app/back/digilib/files/';
    const PATH_DIGILIB_COVER = self::LEOSIRD . '/app/back/digilib/files/';

    public static function base_project()
    {
        return $_SERVER["DOCUMENT_ROOT"];
    }

    public static function template_back_header()
    {
        return self::base_project() . 'digionelib/header.php';
    }

    public static function template_back_footer()
    {
        return self::base_project() . 'digionelib/footer.php';
    }

    public static function template_front_header()
    {
        return self::base_project() . 'digionelib//header.php';
    }

    public static function template_front_footer()
    {
        return self::base_project() . 'digionelib//footer.php';
    }
}