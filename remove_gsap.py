import os
d='E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend'
files=[os.path.join(dp, f) for dp, dn, fn in os.walk(d) for f in fn if f.endswith('.blade.php')]
target='<script src="{{ asset(\'js/gsap.min.js\') }}"></script>'
for f in files:
    content = open(f, 'r', encoding='utf-8').read()
    if target in content:
        content = content.replace(target, '')
        open(f, 'w', encoding='utf-8').write(content)
        print("Updated " + f)
