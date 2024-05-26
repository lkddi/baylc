# -*- coding: utf-8 -*-
import pymysql

# new = pymysql.connect(host="rm-hp39jupdvm955096p.mysql.huhehaote.rds.aliyuncs.com", user="pllx", password="Ddmabc123@@", database="baylc", port=3306)
new = pymysql.connect(host="localhost", user="b_ay_lc", password="Ac6Gy2BfMBhJxXsN", database="b_ay_lc", port=3306)

# new_cursor = new.cursor()
# new_cursor.execute("SELECT * FROM zt_sales")

def add(data):
    # 使用cursor()方法获取操作游标
    cursor = new.cursor()
    # SQL 插入语句
    sql = "INSERT INTO zt_sales(id, purMachineYear, purMachineMonth, retailBillCode, ext12Name, " \
          "ext11Name, ext13Name, ext14Name, ownerShopName ,model, " \
          "brandName ,proposeRetailPrice ,amount ,creatorName ,state ," \
              "goodsCategoryName, purMachineTime, canalTypeName)" \
              "VALUES ('{0}', '{1}', '{2}', '{3}', '{4}', '{5}', '{6}', '{7}', '{8}', '{9}', '{10}', '{11}', '{12}', " \
              "'{13}', '{14}', '{15}', '{16}', '{17}') "
    sql = sql.format(data["ID"], data["PUR_MACHINE_YEAR"], data["PUR_MACHINE_MONTH"], data["RETAILBILLCODE"], data["EXT12NAME"],
                         data["EXT11NAME"], data["SALESDEPTNAME"], data["EXT14NAME"], data["OWNERSHOPNAME"],data["MODEL"],
                         data['BRANDNAME'], data['PROPOSERETAILPRICE'], data['AMOUNT'], data['CREATORNAME'], data['STATE'],
                         data['GOODSCATEGORYNAME'], data['CREATIONDATE'], data['TERMINALCHANNEL'])

    try:
        # 执行sql语句
        sql1 = "ALTER TABLE zt_sales AUTO_INCREMENT = 1"
        cursor.execute(sql1)
        cursor.execute(sql)
        # 提交到数据库执行
        new.commit()
#         print(data["ID"])
    except Exception as e:
        # 如果发生错误则回滚
#         print(e)
        new.rollback()

    # 关闭数据库连接
    # new.close()

def addmsg(data):
    # 使用cursor()方法获取操作游标
    cursor = new.cursor()
    # SQL 插入语句
    cols = [
        "id",
        "subject",
        "content",
        "cts",
        "ts",
        "type",
        "hasAttach",
        "tenantId",
        "sysId",
        "sender",
        "receiveTime",
        "typeName",
        "readStatus",
        "readStatusName",
        "receiver",
        "sendTime"
    ]
    keys = ",".join(cols)
    values = []
    for v in cols:
        values.append("'{" + str(v) + "}'")
    sql = "INSERT INTO messages(" + keys + ")VALUES (" + ",".join(values) + ")"
    s = sql.format(**data)
    # print(s)
    try:
        # 执行sql语句
        sql1 = "ALTER TABLE messages AUTO_INCREMENT = 1"
        cursor.execute(sql1)
        cursor.execute(s)  # 提交到数据库执行
        new.commit()
    except Exception as e:
        # 如果发生错误则回滚
        print(e)
        new.rollback()
    # 关闭数据库连接
    # new.close()


def insert_to_new_store(cursor, data):
#     status_map = {0: 4, 1: 1, 2: 5, 4: 2, 5: 3}
    office_map = {6: 1, 7: 1, 8: 4, 10: 5, 11: 6, 12: 7, 5: 8}
    sql = "INSERT INTO store_info(store_id, store_name, short_name, area_code, province_code, city_code, " \
          "branchoffice_code, type_code, status_code, supervise_id, square_meter, open_time, " \
          "register_name, decorationtype_code, store_manager, manager_phone_num, wifi_ip, " \
          "store_phone_num, store_address, longitude, latitude, create_time, update_time, operation_id)" \
          "VALUES ({0}, '{1}', '{2}', '{3}', '{4}', '{5}', '{6}', '{7}', '{8}', '{9}', '{10}', '{11}', '{12}', " \
          "'{13}', '{14}', " \
          "'{15}', '{16}', '{17}', '{18}', '{19}', '{20}', NOW(), NOW(), 110)"

    areaof = data["area_of"]
    if areaof == "" or areaof is None:
        areaof = 0
    try:
        areaof = float(areaof)
    except Exception as ex:
        areaof = 0
    wifi_ip = data["area_of"]
    if wifi_ip is None:
        wifi_ip = ""
    wifi_ip = wifi_ip.replace(" ", "")
    sql = sql.format(data["StoreId"], data["name"], data["name"], data["zone_id"], data["province_id"], data["city_id"],
                     office_map.get(data["shop"]), 3, status_map.get(data["status"]), 1, areaof,
                     data["build_date"] if data["build_date"] is not None else "2020-01-01", data["regis_name"],
                     0, data["manager"], data["manager_phone"], wifi_ip, data["tel"], data["address"],
                     data["longitude"], data["latitude"])
    # print(sql)
    cursor.execute(sql)


# 插入 门店
def insert_store(data):
    cursor = new.cursor()
    # terminalBases"terminalStoreName": "河北省保定市高碑店市方官镇苏宁零售云店",
    sql = "INSERT INTO zt_stores(name, code, isEnable, canalTypeName, retailCode, retailName, deptRegionCode, " \
          "deptRegionName, deptBigRegionCode ,deptBigRegionName ,title ,storename ,storecode ,riscode ,zid ," \
          "canalTypeCode)" \
          "VALUES ('{0}', '{1}', '{2}', '{3}', '{4}', '{5}', '{6}', '{7}', '{8}', '{9}', '{10}', '{11}', '{12}', " \
          "'{13}', '{14}', '{15}') "
    sql = sql.format(data["name"], data["code"], data["isEnable"], data["canalTypeName"], data["retailCode"],
                     data["retailName"], data["deptRegionCode"], data["deptRegionName"], data["deptBigRegionCode"],
                     data["deptBigRegionName"], data['facadeShort'], data['storename'], data['storecode'],
                     data['riscode'], data['id'], data['canalTypeCode'])
    try:
        # 执行sql语句
        sql1 = "ALTER TABLE zt_stores AUTO_INCREMENT = 1"
        cursor.execute(sql1)
        cursor.execute(sql)  # 提交到数据库执行
        new.commit()
    except Exception as e:
        # 如果发生错误则回滚
#         print(e)
        new.rollback()


# 插入 大区
def insert_big_region(data):
    cursor = new.cursor()
    sql = "INSERT INTO zt_dept_big_regions(title, code)" \
          "VALUES ('{0}', '{1}')"
    sql = sql.format(data["deptBigRegionName"], data["deptBigRegionCode"])
    # print(sql)
    try:
        # 执行sql语句
        sql1 = "ALTER TABLE zt_dept_big_regions AUTO_INCREMENT = 1"
        cursor.execute(sql1)
        cursor.execute(sql)
        # 提交到数据库执行
        new.commit()
    except Exception as e:
        # 如果发生错误则回滚
        # print(e)
        new.rollback()


# 插入 区域
def insert_dept_region(data):
    cursor = new.cursor()
    sql = "INSERT INTO zt_dept_regions(title, code)" \
          "VALUES ('{0}', '{1}')"
    sql = sql.format(data["deptRegionName"], data["deptRegionCode"])
    # print(sql)
    try:
        # 执行sql语句
        sql1 = "ALTER TABLE zt_dept_regions AUTO_INCREMENT = 1"
        cursor.execute(sql1)
        cursor.execute(sql)
        # 提交到数据库执行
        new.commit()
    except Exception as e:
        # 如果发生错误则回滚
        # print(e)
        new.rollback()


# 插入 片区
def insert_retail(data):
    cursor = new.cursor()
    sql = "INSERT INTO zt_retails(title, code)" \
          "VALUES ('{0}', '{1}')"
    sql = sql.format(data["retailName"], data["retailCode"])
    # print(sql)
    try:
        # 执行sql语句
        sql1 = "ALTER TABLE zt_retails AUTO_INCREMENT = 1"
        cursor.execute(sql1)
        cursor.execute(sql)
        # 提交到数据库执行
        new.commit()
    except Exception as e:
        # 如果发生错误则回滚
        # print(e)
        new.rollback()


# 插入 渠道
def insert_canal_type(data):
    cursor = new.cursor()
    sql = "INSERT INTO zt_canal_types(title, Code)" \
          "VALUES ('{0}', '{1}')"
    sql = sql.format(data["canalCategoryName"], data["canalCategoryCode"])
    # print(sql)
    try:
        # 执行sql语句
        sql1 = "ALTER TABLE zt_canal_types AUTO_INCREMENT = 1"
        cursor.execute(sql1)
        cursor.execute(sql)
        # 提交到数据库执行
        new.commit()
    except Exception as e:
        # 如果发生错误则回滚
        # print(e)
        new.rollback()

# 插入 型号
def insert_product(data):
    mode = data["MODEL"]
    b = '-'
    a = mode[mode.index(b) + 1:len(mode)]
    cursor = new.cursor()
    sql = "INSERT INTO zt_products(title, model, price)" \
          "VALUES ('{0}', '{1}', '{2}')"
    sql = sql.format(data["MODEL"], a, data["CUSTOMERZEROAMOUNT"])
    #     print(sql)
    try:
        # 执行sql语句
        sql1 = "ALTER TABLE zt_products AUTO_INCREMENT = 1"
        cursor.execute(sql1)
        cursor.execute(sql)
        # 提交到数据库执行
        new.commit()
    except Exception as e:
        # 如果发生错误则回滚
        # print(e)
        new.rollback()


# 插入 洗护顾问
def insert_promotersts(data):
    cursor = new.cursor()
    sql = "INSERT INTO zt_promotersts(ztid, code ,name ,terminalsupplierCode ,terminalsupplierName" \
          " ,tel ,storecodeCode, storecodeName, retailCode, retailName, " \
          "departmentSecLevelCode, departmentSecLevelName, departmentStairCode, departmentStairName, state)" \
          "VALUES ('{0}', '{1}', '{2}', '{3}', '{4}', '{5}', '{6}', '{7}', '{8}', '{9}', '{10}', '{1}', '{12}', '{13}', '{14}')"
    sql = sql.format(data["id"], data["code"], data["name"], data["terminalsupplierCode"], data["terminalsupplierName"],
                     data["tel"], data['storecodeCode'], data['storecodeName'], data['retailCode'], data['retailName'],
                     data['departmentSecLevelCode'], data['departmentSecLevelName'], data['departmentStairCode'], data['departmentStairName'],data['state'])
    print(sql)
    try:
        # 执行sql语句
        sql1 = "ALTER TABLE zt_promotersts AUTO_INCREMENT = 1"
        cursor.execute(sql1)
        cursor.execute(sql)
        # 提交到数据库执行
        new.commit()
    except Exception as e:
        # 如果发生错误则回滚
        #print(e)
        new.rollback()
