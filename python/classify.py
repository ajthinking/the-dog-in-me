import os
import sys
import json

from fastai.vision import *
import requests

avatar = sys.argv[1]

dir_path = os.path.dirname(os.path.realpath(__file__))

defaults.device = torch.device('cpu')

learn = load_learner(dir_path)

img_data = requests.get(avatar).content
with open(dir_path + '/temp_image.jpeg', 'wb') as handler:
    handler.write(img_data)

temp_image = open_image(dir_path + '/temp_image.jpeg')

pred_class,pred_idx,outputs = learn.predict(temp_image)

result = {}
result['pred_class'] = str(pred_class)
result['avatar'] = avatar
result['accuracy'] = "{0:.0%}".format(outputs.max().item()) 

os.remove(dir_path + '/temp_image.jpeg')

print(json.dumps(result))