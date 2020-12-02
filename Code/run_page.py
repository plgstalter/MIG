import sys, creation_page

profession = int(sys.argv[1]) # médecin(1) ou patient(0)
secu = int(sys.argv[2])

if profession == 1:
    creation_page.medecin(secu)
else:
    creation_page.patient(secu)


