import os
import sys

from fastai.vision import *

dir_path = os.path.dirname(os.path.realpath(__file__))

defaults.device = torch.device('cpu')

learn = load_learner(dir_path)

anders = open_image(dir_path + '/anders.jpg')

pred_class,pred_idx,outputs = learn.predict(anders)

print("This guy looks like", pred_class)
