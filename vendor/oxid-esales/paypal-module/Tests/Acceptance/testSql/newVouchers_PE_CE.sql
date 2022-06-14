INSERT IGNORE INTO `oxvoucherseries` (`OXID`,        `OXSHOPID`,    `OXSERIENR`,           `OXSERIEDESCRIPTION`,      `OXDISCOUNT`, `OXDISCOUNTTYPE`, `OXBEGINDATE`,         `OXENDDATE`,          `OXALLOWSAMESERIES`, `OXALLOWOTHERSERIES`, `OXALLOWUSEANOTHER`, `OXMINIMUMVALUE`, `OXCALCULATEONCE`) VALUES
                              ('testcoupon1',  1, 'Test coupon 1', 'Test coupon 1 desc', 10.00,       'absolute',       '2008-01-01 00:00:00', now() + interval 1 day, 1,                   1,                    1,                   1.00,            1);

INSERT IGNORE INTO `oxvouchers` (`OXDATEUSED`, `OXORDERID`, `OXUSERID`, `OXRESERVED`, `OXVOUCHERNR`, `OXVOUCHERSERIEID`, `OXDISCOUNT`, `OXID`) VALUES
                         ('0000-00-00', '',          '',          0,           '111111',      'testcoupon1',       NULL,        'testvoucher001'),
                         ('0000-00-00', '',          '',          0,           '111111',      'testcoupon1',       NULL,        'testvoucher002'),
                         ('0000-00-00', '',          '',          0,           '111111',      'testcoupon1',       NULL,        'testvoucher003');
