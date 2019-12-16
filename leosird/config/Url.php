<?php

namespace config;

class Url {
    const CNAME_BACK_DIGILIB = 'back_digilib';
    const CNAME_BOOK_CATEGORY = 'back_book_category';
    const CNAME_BACK_ANGGOTA = 'back_anggota';

    const RNAME_INDEX = 'index';
    const RNAME_CREATE = 'create';
    const RNAME_CREATE_ACTION = 'create_action';
    const RNAME_DETAIL = 'detail';
    const RNAME_UPDATE = 'update';
    const RNAME_UPDATE_ACTION = 'update_action';
    const RNAME_DELETE = 'delete';
    const RNAME_READ_PDF = 'read_pdf';

    const BASE = 'http://localhost:3000';
    const LEOSIRD = self::BASE . '/leosird';

    const BASE_BACK_DIGILIB = self::LEOSIRD . '/p?c=' . self::CNAME_BACK_DIGILIB;
    const BACK_DIGILIB_INDEX = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_INDEX;
    const BACK_DIGILIB_DETAIL = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_DETAIL;
    const BACK_DIGILIB_CREATE = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_CREATE;
    const BACK_DIGILIB_CREATE_ACTION = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_CREATE_ACTION;
    const BACK_DIGILIB_UPDATE = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_UPDATE;
    const BACK_DIGILIB_UPDATE_ACTION = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_UPDATE_ACTION;
    const BACK_DIGILIB_DELETE = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_DELETE;
    const BACK_DIGILIB_READ_PDF = self::BASE_BACK_DIGILIB . '&r=' . self::RNAME_READ_PDF;
    
    const BASE_BACK_BOOK_CATEGORY = self::LEOSIRD . '/p?c=' . self::CNAME_BOOK_CATEGORY;
    const BACK_BOOK_CATEGORY_INDEX = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_INDEX;
    const BACK_BOOK_CATEGORY_DETAIL = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_DETAIL;
    const BACK_BOOK_CATEGORY_CREATE = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_CREATE;
    const BACK_BOOK_CATEGORY_CREATE_ACTION = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_CREATE_ACTION;
    const BACK_BOOK_CATEGORY_UPDATE = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_UPDATE;
    const BACK_BOOK_CATEGORY_UPDATE_ACTION = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_UPDATE_ACTION;
    const BACK_BOOK_CATEGORY_DELETE = self::BASE_BACK_BOOK_CATEGORY . '&r=' . self::RNAME_DELETE;

    const BASE_BACK_ANGGOTA = self::LEOSIRD . '/p?c=' . self::CNAME_BACK_ANGGOTA;
    const BACK_ANGGOTA_INDEX = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_INDEX;
    const BACK_ANGGOTA_DETAIL = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_DETAIL;
    const BACK_ANGGOTA_CREATE = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_CREATE;
    const BACK_ANGGOTA_CREATE_ACTION = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_CREATE_ACTION;
    const BACK_ANGGOTA_UPDATE = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_UPDATE;
    const BACK_ANGGOTA_UPDATE_ACTION = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_UPDATE_ACTION;
    const BACK_ANGGOTA_DELETE = self::BASE_BACK_ANGGOTA . '&r=' . self::RNAME_DELETE;

    const PATH_DIGILIB_FILE = self::LEOSIRD . '/app/back/digilib/files/';
    const PATH_DIGILIB_COVER = self::LEOSIRD . '/app/back/digilib/files/';

    public static function base_project()
    {
        return $_SERVER["DOCUMENT_ROOT"];
    }

    public static function template_back_header()
    {
        return self::base_project() . '/templates/back/header.php';
    }

    public static function template_back_footer()
    {
        return self::base_project() . '/templates/back/footer.php';
    }
}