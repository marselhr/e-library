<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Isian :attribute harus diterima.',
    'accepted_if' => ':attribute harus diterima jika :other adalah :value.',
    'active_url' => ' :attribute bukan merupakan URL yang valid.',
    'after' => 'Isian :attribute harus berupa tanggal setelah :date.',
    'after_or_equal' => ':Attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha' => 'Isian :attribute hanya boleh berisi huruf.',
    'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, tanda pisah, dan garis bawah.',
    'alpha_num' => 'Isian :attribute hanya boleh berisi huruf dan angka.',
    'array' => 'Isian :attribute harus berupa larik.',
    'ascii' => ':attribute hanya boleh berisi karakter dan simbol alfanumerik byte tunggal.',
    'before' => 'Isian :attribute harus berupa tanggal sebelum :date.',
    'before_or_equal' => ':attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'Isian :attribute harus memiliki antara :min dan :max item.',
        'file' => 'Isian :attribute harus antara :min dan :max kilobytes.',
        'numeric' => 'Isian :attribute harus antara :min dan :max.',
        'string' => 'Isian :attribute harus antara :min dan :max karakter.',
    ],
    'boolean' => 'Isian :attribute harus benar atau salah.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'current_password' => 'Kata sandi salah.',
    'date' => ':attribute bukan tanggal yang valid.',
    'date_equals' => ':attribute harus merupakan tanggal yang sama dengan :date.',
    'date_format' => ':attribute tidak cocok dengan format :format.',
    'decimal' => 'Isian :attribute harus memiliki :decimal desimal.',
    'declined' => 'Isian :attribute harus ditolak.',
    'declined_if' => 'Isian :attribute harus ditolak jika :other adalah :value.',
    'different' => 'Isian :attribute dan :other harus berbeda.',
    'digits' => 'Isian :attribute harus :digits digits.',
    'digits_between' => ':attribute harus antara :min dan :max digit.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Bidang :attribute memiliki nilai rangkap.',
    'doesnt_end_with' => ':attribute tidak boleh diakhiri dengan salah satu dari: :values.',
    'doesnt_start_with' => ':attribute tidak boleh dimulai dengan salah satu dari berikut: :values.',
    'email' => 'Isian :attribute harus berupa alamat surel yang valid.',
    'ends_with' => ':attribute harus diakhiri dengan salah satu dari: :values.',
    'enum' => ':attribute yang dipilih tidak valid.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'file' => 'Isian :attribute harus berupa berkas.',
    'filled' => 'Bidang :attribute harus memiliki nilai.',
    'gt' => [
        'array' => 'Isian :attribute harus memiliki lebih dari :value item.',
        'file' => ':attribute harus lebih besar dari :value kilobyte.',
        'numeric' => 'Isian :attribute harus lebih besar dari :value.',
        'string' => ':attribute harus lebih besar dari :value karakter.',
    ],
    'gte' => [
        'array' => 'Isian :attribute harus memiliki item :value atau lebih.',
        'file' => ':attribute harus lebih besar dari atau sama dengan :value kilobyte.',
        'numeric' => 'Isian :attribute harus lebih besar atau sama dengan :value.',
        'string' => ':attribute harus lebih besar dari atau sama dengan :value karakter.',
    ],
    'image' => 'Isian :attribute harus berupa gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => 'Bidang :attribute tidak ada di :other.',
    'integer' => 'Isian :attribute harus bilangan bulat.',
    'ip' => 'Isian :attribute harus berupa alamat IP yang valid.',
    'ipv4' => 'Isian :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'Isian :attribute harus berupa alamat IPv6 yang valid.',
    'json' => 'Isian :attribute harus berupa string JSON yang valid.',
    'lowercase' => 'Isian :attribute harus huruf kecil.',
    'lt' => [
        'array' => 'Isian :attribute harus memiliki item kurang dari :value.',
        'file' => ':attribute harus kurang dari :value kilobyte.',
        'numeric' => 'Isian :attribute harus kurang dari :value.',
        'string' => ':attribute harus kurang dari :value karakter.',
    ],
    'lte' => [
        'array' => 'Isian :attribute tidak boleh lebih dari :value item.',
        'file' => ':attribute harus kurang dari atau sama dengan :value kilobyte.',
        'numeric' => 'Isian :attribute harus kurang dari atau sama dengan :value.',
        'string' => ':attribute harus kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address' => ':attribute harus berupa alamat MAC yang valid.',
    'max' => [
        'array' => 'Isian :attribute tidak boleh lebih dari :max item.',
        'file' => 'Isian :attribute tidak boleh lebih besar dari :max kilobyte.',
        'numeric' => 'Isian :attribute tidak boleh lebih besar dari :max.',
        'string' => 'Isian :attribute tidak boleh lebih besar dari :max karakter.',
    ],
    'max_digits' => 'Isian :attribute tidak boleh lebih dari :max digit.',
    'mimes' => ':attribute harus berupa berkas dengan tipe: :values.',
    'mimetypes' => ':attribute harus berupa berkas dengan tipe: :values.',
    'min' => [
        'array' => 'Isian :attribute harus memiliki setidaknya :min item.',
        'file' => 'Isian :attribute minimal harus :min kilobyte.',
        'numeric' => 'Isian :attribute minimal harus :min.',
        'string' => 'Isian :attribute minimal harus :min karakter.',
    ],
    'min_digits' => 'Isian :attribute harus memiliki sedikitnya :min digit.',
    'missing' => 'Bidang :attribute harus kosong.',
    'missing_if' => 'Bidang :attribute harus hilang jika :other adalah :value.',
    'missing_unless' => 'Isi :attribute harus hilang kecuali :other adalah :value.',
    'missing_with' => 'Bidang :attribute harus hilang jika ada :values.',
    'missing_with_all' => 'Bidang :attribute harus hilang jika ada :values.',
    'multiple_of' => 'Isian :attribute harus merupakan kelipatan dari :value.',
    'not_in' => ':attribute yang dipilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => 'Isian :attribute harus berupa angka.',
    'password' => [
        'letters' => 'Isian :attribute harus berisi minimal satu huruf.',
        'mixed' => 'Isian :attribute harus memuat minimal satu huruf besar dan satu huruf kecil.',
        'numbers' => 'Isian :attribute harus mengandung setidaknya satu angka.',
        'symbols' => 'Isian :attribute harus berisi setidaknya satu simbol.',
        'uncompromised' => 'Yang diberikan :attribute telah muncul dalam kebocoran data. Silakan pilih :attribute yang berbeda',
    ],
    'present' => 'Bidang :attribute harus ada.',
    'prohibited' => 'Isi :attribute dilarang.',
    'prohibited_if' => 'Bidang :attribute dilarang jika :other adalah :value.',
    'prohibited_unless' => 'Isi :attribute dilarang kecuali :other ada di :values.',
    'prohibits' => 'Bidang :attribute melarang adanya :other.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => 'Isi :attribute wajib diisi.',
    'required_array_keys' => 'Bidang :attribute harus berisi entri untuk: :values.',
    'required_if' => 'Isi :attribute wajib diisi jika :other adalah :value.',
    'required_if_accepted' => 'Isi :attribute diperlukan ketika :other diterima.',
    'required_unless' => 'Isi :attribute diperlukan kecuali :other ada di :values.',
    'required_with' => 'Bidang :attribute wajib diisi jika ada :values.',
    'required_with_all' => 'Bidang :attribute wajib diisi jika ada :values.',
    'required_without' => 'Isi :attribute wajib diisi jika :values tidak ada.',
    'required_without_all' => 'Isi :attribute wajib diisi jika tidak ada :values.',
    'same' => 'Isian :attribute dan :other harus cocok.',
    'size' => [
        'array' => 'Isian :attribute harus berisi item :size.',
        'file' => 'Isian :attribute harus :size kilobita.',
        'numeric' => 'Isian :attribute harus berupa :size.',
        'string' => 'Isian :attribute harus :size karakter.',
    ],
    'starts_with' => ':Attribute harus diawali dengan salah satu dari: :values.',
    'string' => 'Isian :attribute harus berupa string.',
    'timezone' => 'Isian :attribute harus berupa zona waktu yang valid.',
    'unique' => 'Isian :attribute telah digunakan.',
    'uploaded' => ' :attribute gagal diunggah.',
    'uppercase' => 'Isian :attribute harus huruf besar.',
    'url' => 'Isian :attribute harus berupa URL yang valid.',
    'ulid' => 'Isian :attribute harus berupa ULID yang valid.',
    'uuid' => 'Isian :attribute harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
