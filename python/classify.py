from fastai.vision import *

defaults.device = torch.device('cpu')

learn = load_learner('.')

anders = open_image('./anders.jpg')

pred_class,pred_idx,outputs = learn.predict(anders)

print("This guy looks like", pred_class)
