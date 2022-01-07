<?php

function getUser(PDO $db, int $accountId)
{
    $sql = "SELECT balance
        FROM account
        WHERE id = ?";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        $accountId,
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertTransaction(PDO $db, array $data)
{
    // insert transaction

    $sql = "INSERT INTO `transaction` (account_id, created_at)
        VALUES (?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        $data['account_id'],
        $data['current_date'],
    ]);

    $transactionId = $db->lastInsertId();

    // insert transaction detail

    $sql = "INSERT INTO `transaction_detail` (transaction_id, goods_id, ammount) VALUES ";
    $sqlData = [];
    $sArray = [];

    foreach ($data['purchase'] as $item) {
        $sArray[] = "(?, ?, ?)";

        $sqlData[] = $transactionId;
        $sqlData[] = $item['goods_id'];
        $sqlData[] = $item['ammount'];
    }

    $sql = $sql . implode(', ', $sArray);
    $stmt = $db->prepare($sql);
    $stmt->execute($sqlData);

    return $transactionId;
}

function getToPay(PDO $db, int $transactionId)
{
    $sql = "SELECT SUM(td.ammount * g.price)  as to_pay
    FROM transaction_detail td
    JOIN goods g ON g.id = td.goods_id
    WHERE td.transaction_id = ?";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        $transactionId
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function paymentValidation(float $balance, float $toPay)
{
    if ($balance >= $toPay) {
        return true;
    }

    return false;
}

function paidUserBalance(PDO $db, int $accountId, float $toPay)
{
    $sql = "UPDATE account
        SET
            balance = balance - ?
            WHERE id = ?";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        $toPay,
        $accountId,
    ]);
}

function topupUserBalance(PDO $db, int $accountId, float $topUp)
{
    $sql = "UPDATE account
        SET
            balance = balance + ?
            WHERE id = ?";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        $topUp,
        $accountId,
    ]);
}
