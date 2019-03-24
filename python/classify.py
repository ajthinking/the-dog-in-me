import os
import sys
import json

from fastai.vision import *

dir_path = os.path.dirname(os.path.realpath(__file__))

defaults.device = torch.device('cpu')

learn = load_learner(dir_path)

anders = open_image(dir_path + '/anders.jpg')

pred_class,pred_idx,outputs = learn.predict(anders)

result = {}
result['pred_class'] = str(pred_class)
result['accuracy'] = "{0:.0%}".format(outputs.max().item()) 

print(json.dumps(result))