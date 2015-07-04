
# PYLATIN Translator
pyg = 'ay'
original = input('Enter a word:')
size = len(original)
if size > 0 and original.isalpha():
    word = original.lower()
    first = word[0]
    rest = word[1:]
    print ('The input word is :',original)
    print ('First letter :',first)
else:
    print ("Please input a valid word.")

new_word = rest + first + pyg
print ('The pylatin conversion is :',new_word)

