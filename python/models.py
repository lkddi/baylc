import json

import requests

from function import login, http_post, http_get, session

url = 'http://121.196.14.173/uitemplate_web/iref_ctr/blobRefSearch'

data = {
        'condition': '1001X810000000000XCE',
        'content': '',
        'pk_val': '',
        'filterPks': '',
        'refModelUrl': '/occ-base/base/goods-ref/',
        'pk_org': '',
        'transmitParam': '',
        'refName': '%E5%85%8D%E5%8F%A3%E5%BF%83%E5%85%8D',
        'refCode': '',
        'refModelClassName': '',
        'refModelHandlerClass': '',
        'cfgParam': '{"ctx":"/uitemplate_web","isMultiSelectedEnabled":true}',
        'clientParam': '{"AUTH_refcod":"availableNumNC","AUTH_refdim":"goods"}',
        'refClientPageInfo.pageSize': 10000,
        'refClientPageInfo.currPageIndex': 0
    }

def save_txt(content):
    with open('models.txt', 'a', encoding='utf-8') as file:
        file.write(content)



def get_models():
    response = session.post(url, data=data)

    # 检查响应
    for item in json.loads(response.text)['data']:
        save_txt(f"{item['model']},{item['id']},{item['refcode']},{item['brandName']}\n")
        print(item['model'], item['id'])


if __name__ == '__main__':
    userId = login()

    get_models()

